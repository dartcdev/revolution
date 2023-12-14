<?php  return array (
  'config' => 
  array (
    'allow_tags_in_post' => '1',
    'modRequest.class' => 'MODX\\Revolution\\modManagerRequest',
  ),
  'aliasMap' => 
  array (
  ),
  'webLinkMap' => 
  array (
  ),
  'eventMap' => 
  array (
    'OnBabelDuplicate' => 
    array (
      9 => '9',
    ),
    'OnBeforeDocFormSave' => 
    array (
      9 => '9',
    ),
    'OnChunkFormPrerender' => 
    array (
      1 => '1',
    ),
    'OnContextRemove' => 
    array (
      8 => '8',
    ),
    'OnDocFormPrerender' => 
    array (
      1 => '1',
      9 => '9',
      4 => '4',
      8 => '8',
    ),
    'OnDocFormRender' => 
    array (
      9 => '9',
      10 => '10',
    ),
    'OnDocFormSave' => 
    array (
      9 => '9',
      10 => '10',
      8 => '8',
    ),
    'OnEmptyTrash' => 
    array (
      9 => '9',
      8 => '8',
    ),
    'OnFileCreateFormPrerender' => 
    array (
      1 => '1',
    ),
    'OnFileEditFormPrerender' => 
    array (
      1 => '1',
    ),
    'OnFileManagerUpload' => 
    array (
      6 => '6',
    ),
    'OnHandleRequest' => 
    array (
      3 => '3',
    ),
    'OnLoadWebDocument' => 
    array (
      10 => '10',
      9 => '9',
    ),
    'OnManagerPageBeforeRender' => 
    array (
      1 => '1',
    ),
    'OnMODXInit' => 
    array (
      3 => '3',
      10 => '10',
      9 => '9',
    ),
    'OnPageNotFound' => 
    array (
      9 => '9',
    ),
    'OnPluginFormPrerender' => 
    array (
      1 => '1',
    ),
    'OnResourceBeforeSort' => 
    array (
      9 => '9',
    ),
    'OnResourceDuplicate' => 
    array (
      8 => '8',
      9 => '9',
      10 => '10',
    ),
    'OnResourceSort' => 
    array (
      8 => '8',
    ),
    'OnRichTextBrowserInit' => 
    array (
      7 => '7',
    ),
    'OnRichTextEditorInit' => 
    array (
      7 => '7',
    ),
    'OnRichTextEditorRegister' => 
    array (
      7 => '7',
      1 => '1',
    ),
    'OnSiteRefresh' => 
    array (
      2 => '2',
    ),
    'OnSnipFormPrerender' => 
    array (
      1 => '1',
    ),
    'OnTempFormPrerender' => 
    array (
      1 => '1',
    ),
    'OnTVInputPropertiesList' => 
    array (
      4 => '4',
    ),
    'OnTVInputRenderList' => 
    array (
      1 => '1',
      4 => '4',
    ),
    'OnWebPagePrerender' => 
    array (
      2 => '2',
    ),
    'pdoToolsOnFenomInit' => 
    array (
      3 => '3',
    ),
  ),
  'pluginCache' => 
  array (
    1 => 
    array (
      'id' => 1,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'Ace',
      'description' => 'Ace code editor plugin for MODx Revolution',
      'editor_type' => 0,
      'category' => 0,
      'cache_type' => 0,
      'plugincode' => '/**
 * Ace Source Editor Plugin
 *
 * Events: OnManagerPageBeforeRender, OnRichTextEditorRegister, OnSnipFormPrerender,
 * OnTempFormPrerender, OnChunkFormPrerender, OnPluginFormPrerender,
 * OnFileCreateFormPrerender, OnFileEditFormPrerender, OnDocFormPrerender
 *
 * @author Danil Kostin <danya.postfactum(at)gmail.com>
 *
 * @package ace
 *
 * @var array $scriptProperties
 * @var Ace $ace
 */
if ($modx->event->name == \'OnRichTextEditorRegister\') {
    $modx->event->output(\'Ace\');
    return;
}

if ($modx->getOption(\'which_element_editor\', null, \'Ace\') !== \'Ace\') {
    return;
}

$corePath = $modx->getOption(\'ace.core_path\', null, $modx->getOption(\'core_path\').\'components/ace/\');
$ace = $modx->getService(\'ace\', \'Ace\', $corePath.\'model/ace/\');
$ace->initialize();

$extensionMap = array(
    \'tpl\'   => \'text/x-smarty\',
    \'htm\'   => \'text/html\',
    \'html\'  => \'text/html\',
    \'css\'   => \'text/css\',
    \'scss\'  => \'text/x-scss\',
    \'less\'  => \'text/x-less\',
    \'svg\'   => \'image/svg+xml\',
    \'xml\'   => \'application/xml\',
    \'xsl\'   => \'application/xml\',
    \'js\'    => \'application/javascript\',
    \'json\'  => \'application/json\',
    \'php\'   => \'application/x-php\',
    \'sql\'   => \'text/x-sql\',
    \'md\'    => \'text/x-markdown\',
    \'txt\'   => \'text/plain\',
    \'twig\'  => \'text/x-twig\'
);

// Define default mime for html elements(templates, chunks and html resources)
$html_elements_mime=$modx->getOption(\'ace.html_elements_mime\',null,false);
if(!$html_elements_mime){
    // this may deprecated in future because components may set ace.html_elements_mime option now
    switch (true) {
        case $modx->getOption(\'twiggy_class\'):
            $html_elements_mime = \'text/x-twig\';
            break;
        case $modx->getOption(\'pdotools_fenom_parser\'):
            $html_elements_mime = \'text/x-smarty\';
            break;
        default:
            $html_elements_mime = \'text/html\';
    }
}

// Defines wether we should highlight modx tags
$modxTags = false;
switch ($modx->event->name) {
    case \'OnSnipFormPrerender\':
        $field = \'modx-snippet-snippet\';
        $mimeType = \'application/x-php\';
        break;
    case \'OnTempFormPrerender\':
        $field = \'modx-template-content\';
        $modxTags = true;
        $mimeType = $html_elements_mime;
        break;
    case \'OnChunkFormPrerender\':
        $field = \'modx-chunk-snippet\';
        if ($modx->controller->chunk && $modx->controller->chunk->isStatic()) {
            $extension = pathinfo($modx->controller->chunk->name, PATHINFO_EXTENSION);
            if(!$extension||!isset($extensionMap[$extension])){
                $extension = pathinfo($modx->controller->chunk->getSourceFile(), PATHINFO_EXTENSION);
            }
            $mimeType = isset($extensionMap[$extension]) ? $extensionMap[$extension] : \'text/plain\';
        } else {
            $mimeType = $html_elements_mime;
        }
        $modxTags = true;
        break;
    case \'OnPluginFormPrerender\':
        $field = \'modx-plugin-plugincode\';
        $mimeType = \'application/x-php\';
        break;
    case \'OnFileCreateFormPrerender\':
        $field = \'modx-file-content\';
        $mimeType = \'text/plain\';
        break;
    case \'OnFileEditFormPrerender\':
        $field = \'modx-file-content\';
        $extension = pathinfo($scriptProperties[\'file\'], PATHINFO_EXTENSION);
        $mimeType = isset($extensionMap[$extension])
            ? $extensionMap[$extension]
            : (\'@FILE:\'.pathinfo($scriptProperties[\'file\'], PATHINFO_BASENAME));
        $modxTags = $extension == \'tpl\';
        break;
    case \'OnDocFormPrerender\':
        if (!$modx->controller->resourceArray) {
            return;
        }
        $field = \'ta\';
        $mimeType = $modx->getObject(\'modContentType\', $modx->controller->resourceArray[\'content_type\'])->get(\'mime_type\');

        if($mimeType == \'text/html\')$mimeType = $html_elements_mime;

        if ($modx->getOption(\'use_editor\')){
            $richText = $modx->controller->resourceArray[\'richtext\'];
            $classKey = $modx->controller->resourceArray[\'class_key\'];
            if ($richText || in_array($classKey, array(\'modStaticResource\',\'modSymLink\',\'modWebLink\',\'modXMLRPCResource\'))) {
                $field = false;
            }
        }
        $modxTags = true;
        break;
    case \'OnTVInputRenderList\':
        $modx->event->output($corePath . \'elements/tv/input/\');
        break;
    default:
        return;
}

$modxTags = (int) $modxTags;
$script = \'\';
if (!empty($field)) {
    $script .= "MODx.ux.Ace.replaceComponent(\'$field\', \'$mimeType\', $modxTags);";
}

if ($modx->event->name == \'OnDocFormPrerender\' && !$modx->getOption(\'use_editor\')) {
    $script .= "MODx.ux.Ace.replaceTextAreas(Ext.query(\'.modx-richtext\'));";
}

if ($script) {
    $modx->controller->addHtml(\'<script>Ext.onReady(function() {\' . $script . \'});</script>\');
}',
      'locked' => 0,
      'properties' => NULL,
      'disabled' => 0,
      'moduleguid' => '',
      'static' => 0,
      'static_file' => 'ace/elements/plugins/ace.plugin.php',
    ),
    2 => 
    array (
      'id' => 2,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'pdoTools',
      'description' => '',
      'editor_type' => 0,
      'category' => 1,
      'cache_type' => 0,
      'plugincode' => '/** @var \\MODX\\Revolution\\modX $modx */

switch ($modx->event->name) {
    case \'OnSiteRefresh\':
        /** @var ModxPro\\PdoTools\\CoreTools $coreTools */
        if ($coreTools = $modx->services->get(\'pdotools\')) {
            if ($coreTools->clearFileCache()) {
                $modx->log(modX::LOG_LEVEL_INFO, $modx->lexicon(\'refresh_default\') . \': pdoTools\');
            }
        }
        break;
    case \'OnWebPagePrerender\':
        /** @var ModxPro\\PdoTools\\Parsing\\Parser $parser */
        $parser = $modx->getParser();
        if ($parser instanceof ModxPro\\PdoTools\\Parsing\\Parser) {
            foreach ($parser->ignores as $key => $val) {
                $modx->resource->_output = str_replace($key, $val, $modx->resource->_output);
            }
        }
        break;
}',
      'locked' => 0,
      'properties' => NULL,
      'disabled' => 0,
      'moduleguid' => '',
      'static' => 0,
      'static_file' => 'core/components/pdotools/elements/plugins/plugin.pdotools.php',
    ),
    3 => 
    array (
      'id' => 3,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'ClientConfig',
      'description' => 'Sets system settings from the Client Config CMP.',
      'editor_type' => 0,
      'category' => 0,
      'cache_type' => 0,
      'plugincode' => '/**
 * ClientConfig
 *
 * Copyright 2011-2014 by Mark Hamstra <hello@markhamstra.com>
 *
 * ClientConfig is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * ClientConfig is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * ClientConfig; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package clientconfig
 *
 * @var modX $modx
 * @var int $id
 * @var string $mode
 * @var modResource $resource
 * @var modTemplate $template
 * @var modTemplateVar $tv
 * @var modChunk $chunk
 * @var modSnippet $snippet
 * @var modPlugin $plugin
*/

$eventName = $modx->event->name;

switch($eventName) {
    case \'OnMODXInit\':
    case \'OnHandleRequest\':
    case \'pdoToolsOnFenomInit\':
        // Measure to guard against pdoTools fenom parser loop bug: https://github.com/modmore/ClientConfig/issues/192
        // Here we only allow the pdoToolsOnFenomInit event to trigger the first time.
        if ($eventName === \'pdoToolsOnFenomInit\') {
            if ($modx->getOption(\'clientconfig.fenom_initialized\')) {
                return;
            }
            $modx->setOption(\'clientconfig.fenom_initialized\', true);
        }

        /* Grab the class */
        $path = $modx->getOption(\'clientconfig.core_path\', null, $modx->getOption(\'core_path\') . \'components/clientconfig/\');
        $path .= \'model/clientconfig/\';
        $clientConfig = $modx->getService(\'clientconfig\',\'ClientConfig\', $path);

        /* If we got the class (gotta be careful of failed migrations), grab settings and go! */
        if ($clientConfig instanceof ClientConfig) {
            $contextKey = $modx->context instanceof modContext || $modx->context instanceof \\MODX\\Revolution\\modContext
                ? $modx->context->get(\'key\') : \'web\';
            $settings = $clientConfig->getSettings($contextKey);

            /* Make settings available as [[++tags]] */
            $modx->setPlaceholders($settings, \'+\');

            /* Make settings available for $modx->getOption() */
            foreach ($settings as $key => $value) {
                $modx->setOption($key, $value);
            }
        }
        break;
}

return;',
      'locked' => 0,
      'properties' => NULL,
      'disabled' => 0,
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
    ),
    4 => 
    array (
      'id' => 4,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'MIGX',
      'description' => '',
      'editor_type' => 0,
      'category' => 3,
      'cache_type' => 0,
      'plugincode' => '$corePath = $modx->getOption(\'migx.core_path\',null,$modx->getOption(\'core_path\').\'components/migx/\');
$assetsUrl = $modx->getOption(\'migx.assets_url\', null, $modx->getOption(\'assets_url\') . \'components/migx/\');
switch ($modx->event->name) {
    case \'OnTVInputRenderList\':
        $modx->event->output($corePath.\'elements/tv/input/\');
        break;
    case \'OnTVInputPropertiesList\':
        $modx->event->output($corePath.\'elements/tv/inputoptions/\');
        break;

        case \'OnDocFormPrerender\':
        $modx->controller->addCss($assetsUrl.\'css/mgr.css\');
        break; 
 
    /*          
    case \'OnTVOutputRenderList\':
        $modx->event->output($corePath.\'elements/tv/output/\');
        break;
    case \'OnTVOutputRenderPropertiesList\':
        $modx->event->output($corePath.\'elements/tv/properties/\');
        break;
    
    case \'OnDocFormPrerender\':
        $assetsUrl = $modx->getOption(\'colorpicker.assets_url\',null,$modx->getOption(\'assets_url\').\'components/colorpicker/\'); 
        $modx->regClientStartupHTMLBlock(\'<script type="text/javascript">
        Ext.onReady(function() {
            
        });
        </script>\');
        $modx->regClientStartupScript($assetsUrl.\'sources/ColorPicker.js\');
        $modx->regClientStartupScript($assetsUrl.\'sources/ColorMenu.js\');
        $modx->regClientStartupScript($assetsUrl.\'sources/ColorPickerField.js\');		
        $modx->regClientCSS($assetsUrl.\'resources/css/colorpicker.css\');
        break;
     */
}
return;',
      'locked' => 0,
      'properties' => 'a:0:{}',
      'disabled' => 0,
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
    ),
    6 => 
    array (
      'id' => 6,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'migxResizeOnUpload',
      'description' => '',
      'editor_type' => 0,
      'category' => 3,
      'cache_type' => 0,
      'plugincode' => '/**
 * migxResizeOnUpload Plugin
 *
 * Events: OnFileManagerUpload
 * Author: Bruno Perner <b.perner@gmx.de>
 * Modified to read multiple configs from mediasource-property
 * 
 * First Author: Vasiliy Naumkin <bezumkin@yandex.ru>
 * Required: PhpThumbOf snippet for resizing images
 * 
 * Example: mediasource - property \'resizeConfig\':
 * [{"alias":"origin","w":"500","h":"500","far":1},{"alias":"thumb","w":"150","h":"150","far":1}]
 */

if ($modx->event->name != \'OnFileManagerUpload\') {
    return;
}


$file = $modx->event->params[\'files\'][\'file\'];
$directory = $modx->event->params[\'directory\'];

if ($file[\'error\'] != 0) {
    return;
}

$name = $file[\'name\'];
//$extensions = explode(\',\', $modx->getOption(\'upload_images\'));

$source = $modx->event->params[\'source\'];

if ($source instanceof modMediaSource) {
    //$dirTree = $modx->getOption(\'dirtree\', $_REQUEST, \'\');
    //$modx->setPlaceholder(\'docid\', $resource_id);
    $source->initialize();
    $basePath = str_replace(\'/./\', \'/\', $source->getBasePath());
    //$cachepath = $cachepath . $dirTree;
    $baseUrl = $modx->getOption(\'site_url\') . $source->getBaseUrl();
    //$baseUrl = $baseUrl . $dirTree;
    $sourceProperties = $source->getPropertyList();

    //echo \'<pre>\' . print_r($sourceProperties, 1) . \'</pre>\';
    //$allowedExtensions = $modx->getOption(\'allowedFileTypes\', $sourceProperties, \'\');
    //$allowedExtensions = empty($allowedExtensions) ? \'jpg,jpeg,png,gif\' : $allowedExtensions;
    //$maxFilesizeMb = $modx->getOption(\'maxFilesizeMb\', $sourceProperties, \'8\');
    //$maxFiles = $modx->getOption(\'maxFiles\', $sourceProperties, \'0\');
    //$thumbX = $modx->getOption(\'thumbX\', $sourceProperties, \'100\');
    //$thumbY = $modx->getOption(\'thumbY\', $sourceProperties, \'100\');
    $resizeConfigs = $modx->getOption(\'resizeConfigs\', $sourceProperties, \'\');
    $resizeConfigs = $modx->fromJson($resizeConfigs);
    $thumbscontainer = $modx->getOption(\'thumbscontainer\', $sourceProperties, \'thumbs/\');
    $imageExtensions = $modx->getOption(\'imageExtensions\', $sourceProperties, \'jpg,jpeg,png,gif,JPG\');
    $imageExtensions = explode(\',\', $imageExtensions);
    //$uniqueFilenames = $modx->getOption(\'uniqueFilenames\', $sourceProperties, false);
    //$onImageUpload = $modx->getOption(\'onImageUpload\', $sourceProperties, \'\');
    //$onImageRemove = $modx->getOption(\'onImageRemove\', $sourceProperties, \'\');
    $cleanalias = $modx->getOption(\'cleanFilename\', $sourceProperties, false);

}

if (is_array($resizeConfigs) && count($resizeConfigs) > 0) {
    foreach ($resizeConfigs as $rc) {
        if (isset($rc[\'alias\'])) {
            $filePath = $basePath . $directory;
            $filePath = str_replace(\'//\',\'/\',$filePath);
            if ($rc[\'alias\'] == \'origin\') {
                $thumbPath = $filePath;
            } else {
                $thumbPath = $filePath . $rc[\'alias\'] . \'/\';
                $permissions = octdec(\'0\' . (int)($modx->getOption(\'new_folder_permissions\', null, \'755\', true)));
                if (!@mkdir($thumbPath, $permissions, true)) {
                    $modx->log(MODX_LOG_LEVEL_ERROR, sprintf(\'[migxResourceMediaPath]: could not create directory %s).\', $thumbPath));
                } else {
                    chmod($thumbPath, $permissions);
                }

            }


            $filename = $filePath . $name;
            $thumbname = $thumbPath . $name;
            $ext = substr(strrchr($name, \'.\'), 1);
            if (in_array($ext, $imageExtensions)) {
                $sizes = getimagesize($filename);
                echo $sizes[0]; 
                //$format = substr($sizes[\'mime\'], 6);
                if ($sizes[0] > $rc[\'w\'] || $sizes[1] > $rc[\'h\']) {
                    if ($sizes[0] < $rc[\'w\']) {
                        $rc[\'w\'] = $sizes[0];
                    }
                    if ($sizes[1] < $rc[\'h\']) {
                        $rc[\'h\'] = $sizes[1];
                    }
                    $type = $sizes[0] > $sizes[1] ? \'landscape\' : \'portrait\';
                    if (isset($rc[\'far\']) && $rc[\'far\'] == \'1\' && isset($rc[\'w\']) && isset($rc[\'h\'])) {
                        if ($type = \'landscape\') {
                            unset($rc[\'h\']);
                        }else {
                            unset($rc[\'w\']);
                        }
                    }

                    $options = \'\';
                    foreach ($rc as $k => $v) {
                        if ($k != \'alias\') {
                            $options .= \'&\' . $k . \'=\' . $v;
                        }
                    }
                    $resized = $modx->runSnippet(\'phpthumbof\', array(\'input\' => $filePath . $name, \'options\' => $options));
                    rename(MODX_BASE_PATH . substr($resized, 1), $thumbname);
                }
            }


        }
    }
}',
      'locked' => 0,
      'properties' => 'a:0:{}',
      'disabled' => 0,
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
    ),
    7 => 
    array (
      'id' => 7,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'TinyMCE',
      'description' => 'TinyMCE 4.3.4-pl plugin for MODx Revolution',
      'editor_type' => 0,
      'category' => 0,
      'cache_type' => 0,
      'plugincode' => '/**
 * TinyMCE RichText Editor Plugin
 *
 * Events: OnRichTextEditorInit, OnRichTextEditorRegister,
 * OnBeforeManagerPageInit, OnRichTextBrowserInit
 *
 * @author Jeff Whitfield <jeff@collabpad.com>
 * @author Shaun McCormick <shaun@collabpad.com>
 *
 * @var modX $modx
 * @var array $scriptProperties
 *
 * @package tinymce
 * @subpackage build
 */
if ($modx->event->name == \'OnRichTextEditorRegister\') {
    $modx->event->output(\'TinyMCE\');
    return;
}
require_once $modx->getOption(\'tiny.core_path\',null,$modx->getOption(\'core_path\').\'components/tinymce/\').\'tinymce.class.php\';
$tiny = new TinyMCE($modx,$scriptProperties);

$useEditor = $tiny->context->getOption(\'use_editor\',false);
$whichEditor = $tiny->context->getOption(\'which_editor\',\'\');

/* Handle event */
switch ($modx->event->name) {
    case \'OnRichTextEditorInit\':
        if ($useEditor && $whichEditor == \'TinyMCE\') {
            unset($scriptProperties[\'chunk\']);
            if (isset($forfrontend) || $modx->context->get(\'key\') != \'mgr\') {
                $def = $tiny->context->getOption(\'cultureKey\',$tiny->context->getOption(\'manager_language\',\'en\'));
                $tiny->properties[\'language\'] = $modx->getOption(\'fe_editor_lang\',array(),$def);
                $tiny->properties[\'frontend\'] = true;
                unset($def);
            }
            /* commenting these out as it causes problems with richtext tvs */
            //if (isset($scriptProperties[\'resource\']) && !$resource->get(\'richtext\')) return;
            //if (!isset($scriptProperties[\'resource\']) && !$modx->getOption(\'richtext_default\',null,false)) return;
            $tiny->setProperties($scriptProperties);
            $html = $tiny->initialize();
            $modx->event->output($html);
            unset($html);
        }
        break;
    case \'OnRichTextBrowserInit\':
        if ($useEditor && $whichEditor == \'TinyMCE\') {
            $inRevo20 = (boolean)version_compare($modx->version[\'full_version\'],\'2.1.0-rc1\',\'<\');
            $modx->getVersionData();
            $source = $tiny->context->getOption(\'default_media_source\',null,1);
            
            $modx->controller->addHtml(\'<script type="text/javascript">var inRevo20 = \'.($inRevo20 ? 1 : 0).\';MODx.source = "\'.$source.\'";</script>\');
            
            $modx->controller->addJavascript($tiny->config[\'assetsUrl\'].\'jscripts/tiny_mce/tiny_mce_popup.js\');
            if (file_exists($tiny->config[\'assetsPath\'].\'jscripts/tiny_mce/langs/\'.$tiny->properties[\'language\'].\'.js\')) {
                $modx->controller->addJavascript($tiny->config[\'assetsUrl\'].\'jscripts/tiny_mce/langs/\'.$tiny->properties[\'language\'].\'.js\');
            } else {
                $modx->controller->addJavascript($tiny->config[\'assetsUrl\'].\'jscripts/tiny_mce/langs/en.js\');
            }
            $modx->controller->addJavascript($tiny->config[\'assetsUrl\'].\'tiny.browser.js\');
            $modx->event->output(\'Tiny.browserCallback\');
        }
        return \'\';
        break;

   default: break;
}
return;',
      'locked' => 0,
      'properties' => 'a:39:{s:22:"accessibility_warnings";a:7:{s:4:"name";s:22:"accessibility_warnings";s:4:"desc";s:315:"If this option is set to true some accessibility warnings will be presented to the user if they miss specifying that information. This option is set to true by default, since we should all try to make this world a better place for disabled people. But if you are annoyed with the warnings, set this option to false.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:23:"apply_source_formatting";a:7:{s:4:"name";s:23:"apply_source_formatting";s:4:"desc";s:229:"This option enables you to tell TinyMCE to apply some source formatting to the output HTML code. With source formatting, the output HTML code is indented and formatted. Without source formatting, the output HTML is more compact. ";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:15:"button_tile_map";a:7:{s:4:"name";s:15:"button_tile_map";s:4:"desc";s:338:"If this option is set to true TinyMCE will use tiled images instead of individual images for most of the editor controls. This produces faster loading time since only one GIF image needs to be loaded instead of a GIF for each individual button. This option is set to false by default since it doesn\'t work with some DOCTYPE declarations. ";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:0;s:7:"lexicon";N;s:4:"area";s:0:"";}s:7:"cleanup";a:7:{s:4:"name";s:7:"cleanup";s:4:"desc";s:331:"This option enables or disables the built-in clean up functionality. TinyMCE is equipped with powerful clean up functionality that enables you to specify what elements and attributes are allowed and how HTML contents should be generated. This option is set to true by default, but if you want to disable it you may set it to false.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:18:"cleanup_on_startup";a:7:{s:4:"name";s:18:"cleanup_on_startup";s:4:"desc";s:135:"If you set this option to true, TinyMCE will perform a HTML cleanup call when the editor loads. This option is set to false by default.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:0;s:7:"lexicon";N;s:4:"area";s:0:"";}s:22:"convert_fonts_to_spans";a:7:{s:4:"name";s:22:"convert_fonts_to_spans";s:4:"desc";s:348:"If you set this option to true, TinyMCE will convert all font elements to span elements and generate span elements instead of font elements. This option should be used in order to get more W3C compatible code, since font elements are deprecated. How sizes get converted can be controlled by the font_size_classes and font_size_style_values options.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:23:"convert_newlines_to_brs";a:7:{s:4:"name";s:23:"convert_newlines_to_brs";s:4:"desc";s:128:"If you set this option to true, newline characters codes get converted into br elements. This option is set to false by default.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:0;s:7:"lexicon";N;s:4:"area";s:0:"";}s:12:"convert_urls";a:7:{s:4:"name";s:12:"convert_urls";s:4:"desc";s:495:"This option enables you to control whether TinyMCE is to be clever and restore URLs to their original values. URLs are automatically converted (messed up) by default because the built-in browser logic works this way. There is no way to get the real URL unless you store it away. If you set this option to false it will try to keep these URLs intact. This option is set to true by default, which means URLs will be forced to be either absolute or relative depending on the state of relative_urls.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:11:"dialog_type";a:7:{s:4:"name";s:11:"dialog_type";s:4:"desc";s:246:"This option enables you to specify how dialogs/popups should be opened. Possible values are "window" and "modal", where the window option opens a normal window and the dialog option opens a modal dialog. This option is set to "window" by default.";s:4:"type";s:4:"list";s:7:"options";a:2:{i:0;a:2:{i:0;s:6:"window";s:4:"text";s:6:"Window";}i:1;a:2:{i:0;s:5:"modal";s:4:"text";s:5:"Modal";}}s:5:"value";s:6:"window";s:7:"lexicon";N;s:4:"area";s:0:"";}s:14:"directionality";a:7:{s:4:"name";s:14:"directionality";s:4:"desc";s:261:"This option specifies the default writing direction. Some languages (Like Hebrew, Arabic, Urdu...) write from right to left instead of left to right. The default value of this option is "ltr" but if you want to use from right to left mode specify "rtl" instead.";s:4:"type";s:4:"list";s:7:"options";a:2:{i:0;a:2:{s:5:"value";s:3:"ltr";s:4:"text";s:13:"Left to Right";}i:1;a:2:{s:5:"value";s:3:"rtl";s:4:"text";s:13:"Right to Left";}}s:5:"value";s:3:"ltr";s:7:"lexicon";N;s:4:"area";s:0:"";}s:14:"element_format";a:7:{s:4:"name";s:14:"element_format";s:4:"desc";s:210:"This option enables control if elements should be in html or xhtml mode. xhtml is the default state for this option. This means that for example &lt;br /&gt; will be &lt;br&gt; if you set this option to "html".";s:4:"type";s:4:"list";s:7:"options";a:2:{i:0;a:2:{s:5:"value";s:5:"xhtml";s:4:"text";s:5:"XHTML";}i:1;a:2:{s:5:"value";s:4:"html";s:4:"text";s:4:"HTML";}}s:5:"value";s:5:"xhtml";s:7:"lexicon";N;s:4:"area";s:0:"";}s:15:"entity_encoding";a:7:{s:4:"name";s:15:"entity_encoding";s:4:"desc";s:70:"This option controls how entities/characters get processed by TinyMCE.";s:4:"type";s:4:"list";s:7:"options";a:4:{i:0;a:2:{s:5:"value";s:0:"";s:4:"text";s:4:"None";}i:1;a:2:{s:5:"value";s:5:"named";s:4:"text";s:5:"Named";}i:2;a:2:{s:5:"value";s:7:"numeric";s:4:"text";s:7:"Numeric";}i:3;a:2:{s:5:"value";s:3:"raw";s:4:"text";s:3:"Raw";}}s:5:"value";s:0:"";s:7:"lexicon";N;s:4:"area";s:0:"";}s:16:"force_p_newlines";a:7:{s:4:"name";s:16:"force_p_newlines";s:4:"desc";s:147:"This option enables you to disable/enable the creation of paragraphs on return/enter in Mozilla/Firefox. The default value of this option is true. ";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:22:"force_hex_style_colors";a:7:{s:4:"name";s:22:"force_hex_style_colors";s:4:"desc";s:277:"This option enables you to control TinyMCE to force the color format to use hexadecimal instead of rgb strings. It converts for example "color: rgb(255, 255, 0)" to "#FFFF00". This option is set to true by default since otherwice MSIE and Firefox would differ in this behavior.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:6:"height";a:7:{s:4:"name";s:6:"height";s:4:"desc";s:38:"Sets the height of the TinyMCE editor.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:5:"400px";s:7:"lexicon";N;s:4:"area";s:0:"";}s:11:"indentation";a:7:{s:4:"name";s:11:"indentation";s:4:"desc";s:139:"This option allows specification of the indentation level for indent/outdent buttons in the UI. This defaults to 30px but can be any value.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:4:"30px";s:7:"lexicon";N;s:4:"area";s:0:"";}s:16:"invalid_elements";a:7:{s:4:"name";s:16:"invalid_elements";s:4:"desc";s:163:"This option should contain a comma separated list of element names to exclude from the content. Elements in this list will removed when TinyMCE executes a cleanup.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";N;s:4:"area";s:0:"";}s:6:"nowrap";a:7:{s:4:"name";s:6:"nowrap";s:4:"desc";s:212:"This nowrap option enables you to control how whitespace is to be wordwrapped within the editor. This option is set to false by default, but if you enable it by setting it to true editor contents will never wrap.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:0;s:7:"lexicon";N;s:4:"area";s:0:"";}s:15:"object_resizing";a:7:{s:4:"name";s:15:"object_resizing";s:4:"desc";s:148:"This option gives you the ability to turn on/off the inline resizing controls of tables and images in Firefox/Mozilla. These are enabled by default.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:12:"path_options";a:7:{s:4:"name";s:12:"path_options";s:4:"desc";s:119:"Sets a group of options. Note: This will override the relative_urls, document_base_url and remove_script_host settings.";s:4:"type";s:9:"textfield";s:7:"options";a:3:{i:0;a:2:{s:5:"value";s:11:"docrelative";s:4:"text";s:17:"Document Relative";}i:1;a:2:{s:5:"value";s:12:"rootrelative";s:4:"text";s:13:"Root Relative";}i:2;a:2:{s:5:"value";s:11:"fullpathurl";s:4:"text";s:13:"Full Path URL";}}s:5:"value";s:11:"docrelative";s:7:"lexicon";N;s:4:"area";s:0:"";}s:28:"plugin_insertdate_dateFormat";a:7:{s:4:"name";s:28:"plugin_insertdate_dateFormat";s:4:"desc";s:53:"Formatting of dates when using the InsertDate plugin.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:8:"%Y-%m-%d";s:7:"lexicon";N;s:4:"area";s:0:"";}s:28:"plugin_insertdate_timeFormat";a:7:{s:4:"name";s:28:"plugin_insertdate_timeFormat";s:4:"desc";s:53:"Formatting of times when using the InsertDate plugin.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:8:"%H:%M:%S";s:7:"lexicon";N;s:4:"area";s:0:"";}s:12:"preformatted";a:7:{s:4:"name";s:12:"preformatted";s:4:"desc";s:231:"If you enable this feature, whitespace such as tabs and spaces will be preserved. Much like the behavior of a &lt;pre&gt; element. This can be handy when integrating TinyMCE with webmail clients. This option is disabled by default.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:13:"relative_urls";a:7:{s:4:"name";s:13:"relative_urls";s:4:"desc";s:231:"If this option is set to true, all URLs returned from the file manager will be relative from the specified document_base_url. If it is set to false all URLs will be converted to absolute URLs. This option is set to true by default.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:17:"remove_linebreaks";a:7:{s:4:"name";s:17:"remove_linebreaks";s:4:"desc";s:531:"This option controls whether line break characters should be removed from output HTML. This option is enabled by default because there are differences between browser implementations regarding what to do with white space in the DOM. Gecko and Safari place white space in text nodes in the DOM. IE and Opera remove them from the DOM and therefore the line breaks will automatically be removed in those. This option will normalize this behavior when enabled (true) and all browsers will have a white-space-stripped DOM serialization.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:0;s:7:"lexicon";N;s:4:"area";s:0:"";}s:18:"remove_script_host";a:7:{s:4:"name";s:18:"remove_script_host";s:4:"desc";s:221:"If this option is enabled the protocol and host part of the URLs returned from the file manager will be removed. This option is only used if the relative_urls option is set to false. This option is set to true by default.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:20:"remove_trailing_nbsp";a:7:{s:4:"name";s:20:"remove_trailing_nbsp";s:4:"desc";s:392:"This option enables you to specify that TinyMCE should remove any traling &nbsp; characters in block elements if you start to write inside them. Paragraphs are default padded with a &nbsp; and if you write text into such paragraphs the space will remain. Setting this option to true will remove the space. This option is set to false by default since the cursor jumps a bit in Gecko browsers.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:0;s:7:"lexicon";N;s:4:"area";s:0:"";}s:4:"skin";a:7:{s:4:"name";s:4:"skin";s:4:"desc";s:330:"This option enables you to specify what skin you want to use with your theme. A skin is basically a CSS file that gets loaded from the skins directory inside the theme. The advanced theme that TinyMCE comes with has two skins, these are called "default" and "o2k7". We added another skin named "cirkuit" that is chosen by default.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:7:"cirkuit";s:7:"lexicon";N;s:4:"area";s:0:"";}s:12:"skin_variant";a:7:{s:4:"name";s:12:"skin_variant";s:4:"desc";s:403:"This option enables you to specify a variant for the skin, for example "silver" or "black". "default" skin does not offer any variant, whereas "o2k7" default offers "silver" or "black" variants to the default one. For the "cirkuit" skin there\'s one variant named "silver". When creating a skin, additional variants may also be created, by adding ui_[variant_name].css files alongside the default ui.css.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";N;s:4:"area";s:0:"";}s:20:"table_inline_editing";a:7:{s:4:"name";s:20:"table_inline_editing";s:4:"desc";s:231:"This option gives you the ability to turn on/off the inline table editing controls in Firefox/Mozilla. According to the TinyMCE documentation, these controls are somewhat buggy and not redesignable, so they are disabled by default.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:22:"theme_advanced_disable";a:7:{s:4:"name";s:22:"theme_advanced_disable";s:4:"desc";s:111:"This option should contain a comma separated list of controls to disable from any toolbar row/panel in TinyMCE.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";N;s:4:"area";s:0:"";}s:19:"theme_advanced_path";a:7:{s:4:"name";s:19:"theme_advanced_path";s:4:"desc";s:331:"This option gives you the ability to enable/disable the element path. This option is only useful if the theme_advanced_statusbar_location option is set to "top" or "bottom". This option is set to "true" by default. Setting this option to "false" will effectively hide the path tool, though it still takes up room in the Status Bar.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:32:"theme_advanced_resize_horizontal";a:7:{s:4:"name";s:32:"theme_advanced_resize_horizontal";s:4:"desc";s:319:"This option gives you the ability to enable/disable the horizontal resizing. This option is only useful if the theme_advanced_statusbar_location option is set to "top" or "bottom" and when the theme_advanced_resizing is set to true. This option is set to true by default, allowing both resizing horizontal and vertical.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:23:"theme_advanced_resizing";a:7:{s:4:"name";s:23:"theme_advanced_resizing";s:4:"desc";s:216:"This option gives you the ability to enable/disable the resizing button. This option is only useful if the theme_advanced_statusbar_location option is set to "top" or "bottom". This option is set to false by default.";s:4:"type";s:13:"combo-boolean";s:7:"options";s:0:"";s:5:"value";b:1;s:7:"lexicon";N;s:4:"area";s:0:"";}s:33:"theme_advanced_statusbar_location";a:7:{s:4:"name";s:33:"theme_advanced_statusbar_location";s:4:"desc";s:257:"This option enables you to specify where the element statusbar with the path and resize tool should be located. This option can be set to "top" or "bottom". The default value is set to "top". This option can only be used when the theme is set to "advanced".";s:4:"type";s:4:"list";s:7:"options";a:2:{i:0;a:2:{s:5:"value";s:3:"top";s:4:"text";s:3:"Top";}i:1;a:2:{s:5:"value";s:6:"bottom";s:4:"text";s:6:"Bottom";}}s:5:"value";s:6:"bottom";s:7:"lexicon";N;s:4:"area";s:0:"";}s:28:"theme_advanced_toolbar_align";a:7:{s:4:"name";s:28:"theme_advanced_toolbar_align";s:4:"desc";s:187:"This option enables you to specify the alignment of the toolbar, this value can be "left", "right" or "center" (the default). This option can only be used when theme is set to "advanced".";s:4:"type";s:9:"textfield";s:7:"options";a:3:{i:0;a:2:{s:5:"value";s:6:"center";s:4:"text";s:6:"Center";}i:1;a:2:{s:5:"value";s:4:"left";s:4:"text";s:4:"Left";}i:2;a:2:{s:5:"value";s:5:"right";s:4:"text";s:5:"Right";}}s:5:"value";s:4:"left";s:7:"lexicon";N;s:4:"area";s:0:"";}s:31:"theme_advanced_toolbar_location";a:7:{s:4:"name";s:31:"theme_advanced_toolbar_location";s:4:"desc";s:191:"
This option enables you to specify where the toolbar should be located. This option can be set to "top" or "bottom" (the defualt). This option can only be used when theme is set to advanced.";s:4:"type";s:4:"list";s:7:"options";a:2:{i:0;a:2:{s:5:"value";s:3:"top";s:4:"text";s:3:"Top";}i:1;a:2:{s:5:"value";s:6:"bottom";s:4:"text";s:6:"Bottom";}}s:5:"value";s:3:"top";s:7:"lexicon";N;s:4:"area";s:0:"";}s:5:"width";a:7:{s:4:"name";s:5:"width";s:4:"desc";s:32:"The width of the TinyMCE editor.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:3:"95%";s:7:"lexicon";N;s:4:"area";s:0:"";}s:33:"template_selected_content_classes";a:7:{s:4:"name";s:33:"template_selected_content_classes";s:4:"desc";s:234:"Specify a list of CSS class names for the template plugin. They must be separated by spaces. Any template element with one of the specified CSS classes will have its content replaced by the selected editor content when first inserted.";s:4:"type";s:9:"textfield";s:7:"options";s:0:"";s:5:"value";s:0:"";s:7:"lexicon";N;s:4:"area";s:0:"";}}',
      'disabled' => 0,
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
    ),
    8 => 
    array (
      'id' => 8,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'Babel',
      'description' => 'Links and synchronizes multilingual resources.',
      'editor_type' => 0,
      'category' => 5,
      'cache_type' => 0,
      'plugincode' => '/**
 * Babel
 *
 * Copyright 2010 by Jakob Class <jakob.class@class-zec.de>
 *
 * This file is part of Babel.
 *
 * Babel is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * Babel is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * Babel; if not, write to the Free Software Foundation, Inc., 59 Temple Place,
 * Suite 330, Boston, MA 02111-1307 USA
 *
 * @package babel
 */
/**
 * Babel Plugin to link and synchronize multilingual resources
 *
 * Based on ideas of Sylvain Aerni <enzyms@gmail.com>
 *
 * Events:
 * OnDocFormPrerender,OnDocFormSave,OnEmptyTrash,OnContextRemove,OnResourceDuplicate
 *
 * @author Jakob Class <jakob.class@class-zec.de>
 *         goldsky <goldsky@virtudraft.com>
 *
 * @package babel
 *
 */
$babel = $modx->getService(\'babel\', \'Babel\', $modx->getOption(\'babel.core_path\', null, $modx->getOption(\'core_path\').\'components/babel/\').\'model/babel/\');

/* be sure babel TV is loaded */
if (!($babel instanceof Babel) || !$babel->babelTv)
    return;

switch ($modx->event->name) {
    case \'OnDocFormPrerender\':
        $output       = \'\';
        $errorMessage = \'\';
        $resource     = & $modx->event->params[\'resource\'];
        if (!$resource) {
            /* a new resource is being to created
             * -> skip rendering the babel box */
            break;
        }
        $linkedResources = $babel->getLinkedResources($resource->get(\'id\'));
        if (empty($linkedResources)) {
            /* always be sure that the Babel TV is set */
            $babel->initBabelTv($resource);
        }

        /* create babel-box with links to translations */
        $outputLanguageItems = \'\';
        if (!$modx->lexicon) {
            $modx->getService(\'lexicon\', \'modLexicon\');
        }
        $languagesStore = [];
        $contextKeys    = $babel->getGroupContextKeys($resource->get(\'context_key\'));
        foreach ($contextKeys as $contextKey) {
            /* for each (valid/existing) context of the context group a button will be displayed */
            $context = $modx->getObject(\'modContext\', [\'key\' => $contextKey]);
            if (!$context) {
                $modx->log(modX::LOG_LEVEL_ERROR, \'Could not load context: \'.$contextKey);
                continue;
            }
            $context->prepare();
            $cultureKey       = $context->getOption(\'cultureKey\', $modx->getOption(\'cultureKey\'));
            $languagesStore[] = [$modx->lexicon(\'babel.language_\'.$cultureKey)." ($contextKey)", $contextKey];
        }

        $babel->config[\'context_key\']    = $resource->get(\'context_key\');
        $babel->config[\'languagesStore\'] = $languagesStore;
        $babel->config[\'menu\']           = $babel->getMenu($resource);
        if (empty($babel->config[\'menu\'])) {
            $modx->log(modX::LOG_LEVEL_ERROR, \'[Babel] Could not load menu for context key: "\'.$babel->config[\'context_key\'].\'". Try to check "babel.contextKeys" in System Settings. If this is intended, you can ignore this warning.\');
            return;
        }
        $version         = str_replace(\' \', \'\', $babel->config[\'version\']);
        $isCSSCompressed = $modx->getOption(\'compress_css\');
        $withVersion     = $isCSSCompressed ? \'\' : \'?v=\'.$version;
        $modx->controller->addCss($babel->config[\'cssUrl\'].\'babel.css\'.$withVersion);

        $modx->controller->addLexiconTopic(\'babel:default\');
        $isJsCompressed = $modx->getOption(\'compress_js\');
        $withVersion    = $isJsCompressed ? \'\' : \'?v=\'.$version;
        $modx->controller->addJavascript($babel->config[\'jsUrl\'].\'babel.class.js\'.$withVersion);
        $modx->controller->addHtml(\'
<script type="text/javascript">
    Ext.onReady(function () {
        var babel = new Babel(\'.json_encode($babel->config).\');
        babel.getMenu(babel.config.menu);
    });
</script>\');
        break;

    case \'OnDocFormSave\':
        $resource = & $modx->event->params[\'resource\'];
        if (!$resource) {
            $modx->log(modX::LOG_LEVEL_ERROR, \'No resource provided for OnDocFormSave event\');
            break;
        }
        if ($modx->event->params[\'mode\'] == modSystemEvent::MODE_NEW) {
            /* no TV synchronization for new resources, just init Babel TV */
            $babel->initBabelTv($resource);
            break;
        }
        $babel->synchronizeTvs($resource->get(\'id\'));
        break;

    case \'OnEmptyTrash\':
        /* remove translation links to non-existing resources */
        $deletedResourceIds = & $modx->event->params[\'ids\'];
        if (is_array($deletedResourceIds)) {
            foreach ($deletedResourceIds as $deletedResourceId) {
                $babel->removeLanguageLinksToResource($deletedResourceId);
            }
        }
        break;

    case \'OnContextRemove\':
        /* remove translation links to non-existing contexts */
        $context = & $modx->event->params[\'context\'];
        if ($context) {
            $babel->removeLanguageLinksToContext($context->get(\'key\'));
        }
        break;

    case \'OnResourceDuplicate\':
        /* init Babel TV of duplicated resources */
        $resource = & $modx->event->params[\'newResource\'];
        $babel->initBabelTvsRecursive($modx, $babel, $resource->get(\'id\'));
        break;

    case \'OnResourceSort\':
        $nodesAffected = & $modx->event->params[\'nodesAffected\'];
        foreach ($nodesAffected as $node) {
            $linkedResources = $babel->getLinkedResources($node->get(\'id\'));
            foreach ($linkedResources as $key => $id) {
                if ($id === $node->get(\'id\')) {
                    unset($linkedResources[$key]);
                }
            }
            $linkedResources[$node->get(\'context_key\')] = $node->get(\'id\');
            $babel->updateBabelTv($linkedResources, $linkedResources);
        }

        break;

    case \'OnSiteRefresh\':
        $cacheManager = $modx->getCacheManager();
        $cacheManager->refresh([
            \'babel\' => [],
                               ]);
        break;

    default:
        break;
}
return;',
      'locked' => 0,
      'properties' => 'a:0:{}',
      'disabled' => 0,
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
    ),
    9 => 
    array (
      'id' => 9,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'SEO Suite',
      'description' => 'Plugin to handle the SEO Suite redirects.',
      'editor_type' => 0,
      'category' => 9,
      'cache_type' => 0,
      'plugincode' => 'use Sterc\\SeoSuite\\SeoSuite;

$seosuite = $modx->services->get(\'seosuite\');
$seosuite->firePlugins($modx->event, $scriptProperties);',
      'locked' => 0,
      'properties' => 'a:0:{}',
      'disabled' => 0,
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
    ),
    10 => 
    array (
      'id' => 10,
      'source' => 0,
      'property_preprocess' => 0,
      'name' => 'seoPro',
      'description' => 'SEO optimizing plugin for MODx Revolution.',
      'editor_type' => 0,
      'category' => 10,
      'cache_type' => 0,
      'plugincode' => '/**
 * The base seoPro snippet.
 *
 * @package seopro
 */
$seoPro = $modx->getService(\'seopro\', \'seoPro\', $modx->getOption(\'seopro.core_path\', null, $modx->getOption(\'core_path\') . \'components/seopro/\') . \'model/seopro/\', $scriptProperties);
if (!($seoPro instanceof seoPro)) {
    return \'\';
}

$disabledTemplates = explode(\',\', $modx->getOption(\'seopro.disabledtemplates\', null, \'0\'));

switch ($modx->event->name) {
    case \'OnMODXInit\':
        $version = $modx->getVersionData();
        $version = (int)($version[\'version\'] . $version[\'major_version\']);
        if ($version < 27) {
            $modx->loadClass(\'modResource\');
            $modx->map[\'modResource\'][\'fieldMeta\'][\'description\'] = array(
                \'dbtype\' => \'text\',
                \'phptype\' => \'string\',
                \'index\' => \'fulltext\',
                \'indexgrp\' => \'content_ft_idx\',
            );
        }
        break;

    case \'OnDocFormRender\':
        $template = (string)$resource->get(\'template\');
        $override = false;
        if (isset($_REQUEST[\'template\'])) {
            $template = (string)$_REQUEST[\'template\'];
            $override = true;
        }
        if (($override && $template === \'0\') || (!empty($template) && in_array($template, $disabledTemplates))) {
            break;
        }
        
        $currClassKey = $resource->get(\'class_key\');
        $strFields = $modx->getOption(\'seopro.fields\', null, \'pagetitle:70,longtitle:70,description:320,alias:2023,menutitle:2023\');
        $arrFields = array();
        if (is_array(explode(\',\', $strFields))) {
            foreach (explode(\',\', $strFields) as $field) {
                list($fieldName, $fieldCount) = explode(\':\', $field);
                $arrFields[$fieldName] = $fieldCount;
            }
        } else {
            return \'\';
        }

        $keywords = \'\';
        $modx->controller->addLexiconTopic(\'seopro:default\');
        $ctxKey = !empty($resource) ? $resource->get(\'context_key\') : $modx->getOption(\'default_context\');
        $ctx = $modx->getContext($ctxKey);
        if ($ctx) {
            $url = $ctx->getOption(\'site_url\', \'\', $modx->getOption(\'site_url\'));
        } else {
            $url = $modx->getOption(\'site_url\');
        }
        if ($mode == \'upd\') {
            if ($ctx) {
                if ($resource->get(\'id\') != $ctx->getOption(\'site_start\', \'\', $modx->getOption(\'site_start\'))) {
                    $url .= $resource->get(\'uri\');
                }
            } else {
                $url = $modx->makeUrl($resource->get(\'id\'), \'\', \'\', \'full\');
            }
            $url = str_replace(
                $resource->get(\'alias\'),
                \'<span id=\\"seopro-replace-alias\\">\' . $resource->get(\'alias\') . \'</span>\',
                $url
            );
            $seoKeywords = $modx->getObject(\'seoKeywords\', array(\'resource\' => $resource->get(\'id\')));
            if ($seoKeywords) {
                $keywords = $seoKeywords->get(\'keywords\');
            }
        }

        if ($_REQUEST[\'id\'] == $modx->getOption(\'site_start\')) {
            unset($arrFields[\'alias\']);
            unset($arrFields[\'menutitle\']);
        }


        $config = $seoPro->config;
        unset($config[\'resource\']);
        $modx->regClientStartupHTMLBlock(\'<script type="text/javascript">
        Ext.onReady(function() {
            seoPro.config = \' . $modx->toJSON($config) . \';
            seoPro.config.record = "\' . $keywords . \'";
            seoPro.config.values = {};
            seoPro.config.fields = "\' . implode(",", array_keys($arrFields)) . \'";
            seoPro.config.chars = \' . $modx->toJSON($arrFields) . \'
            seoPro.config.url = "\' . $url . \'";
        });</script>\');

        /* include CSS and JS*/
        $version = $modx->getVersionData();
        if($version[\'version\'] == 2 && $version[\'major_version\'] == 2){
            $modx->regClientCSS($seoPro->config[\'assetsUrl\'] . \'css/mgr.css\');
        }else{
            $modx->regClientCSS($seoPro->config[\'assetsUrl\'] . \'css/mgr23.css\');
        }
        $modx->regClientStartupScript($seoPro->config[\'assetsUrl\'] . \'js/mgr/seopro.js??v=\' . $modx->getOption(\'seopro.version\', null, \'v1.0.0\'));
        $modx->regClientStartupScript($seoPro->config[\'assetsUrl\'] . \'js/mgr/resource.js?v=\' . $modx->getOption(\'seopro.version\', null, \'v1.0.0\'));

        break;

    case \'OnDocFormSave\':
        $template = (string)$resource->get(\'template\');
        $override = false;
        if (isset($_REQUEST[\'template\'])) {
            $template = (string)$_REQUEST[\'template\'];
            $override = true;
        }
        if (($override && $template === \'0\') || (!empty($template) && in_array($template, $disabledTemplates))) {
            break;
        }
        $seoKeywords = $modx->getObject(\'seoKeywords\', array(\'resource\' => $resource->get(\'id\')));
        if (!$seoKeywords && isset($resource)) {
            $seoKeywords = $modx->newObject(\'seoKeywords\', array(\'resource\' => $resource->get(\'id\')));
        }
        if($seoKeywords){
            if (isset($_POST[\'keywords\'])){
                $seoKeywords->set(\'keywords\', trim($_POST[\'keywords\'], \',\'));
            } else {
                $seoKeywords->set(\'keywords\', \'\');
            }
            $seoKeywords->save();
        }
        break;

    case \'onResourceDuplicate\':
        $template = (string)$resource->get(\'template\');
        $override = false;
        if (isset($_REQUEST[\'template\'])) {
            $template = (string)$_REQUEST[\'template\'];
            $override = true;
        }
        if (($override && $template === \'0\') || (!empty($template) && in_array($template, $disabledTemplates))) {
            break;
        }

        $seoKeywords = $modx->getObject(\'seoKeywords\', array(\'resource\' => $resource->get(\'id\')));
        if (!$seoKeywords) {
            $seoKeywords = $modx->newObject(\'seoKeywords\', array(\'resource\' => $resource->get(\'id\')));
        }
        $newSeoKeywords = $modx->newObject(\'seoKeywords\');
        $newSeoKeywords->fromArray($seoKeywords->toArray());
        $newSeoKeywords->set(\'resource\', $newResource->get(\'id\'));
        $newSeoKeywords->save();
        break;

    case \'OnLoadWebDocument\':
        if ($modx->context->get(\'key\') == "mgr") {
            break;
        }
        $template = ($modx->resource->get(\'template\')) ? (string)$modx->resource->get(\'template\') : \'\';
        if (in_array($template, $disabledTemplates)) {
            break;
        }
        $seoKeywords = $modx->getObject(\'seoKeywords\', array(\'resource\' => $modx->resource->get(\'id\')));
        if ($seoKeywords) {
            $keyWords = $seoKeywords->get(\'keywords\');
            $modx->setPlaceholder(\'seoPro.keywords\', $keyWords);
        }
        // Render the meta title, based on system settings
        $titleFormat = $modx->getOption(\'seopro.title_format\');
        if (empty($titleFormat)) {
            $siteDelimiter = $modx->getOption(\'seopro.delimiter\', null, \'/\');
            $siteUseSitename = (boolean)$modx->getOption(\'seopro.usesitename\', null, true);
            $siteID = $modx->resource->get(\'id\');
            $siteName = $modx->getOption(\'site_name\');
            $longtitle = $modx->resource->get(\'longtitle\');
            $pagetitle = $modx->resource->get(\'pagetitle\');
            $seoProTitle = array();
            if ($siteID == $modx->getOption(\'site_start\')) {
                $seoProTitle[\'pagetitle\'] = !empty($longtitle) ? $longtitle : $siteName;
            } else {
                $seoProTitle[\'pagetitle\'] = !empty($longtitle) ? $longtitle : $pagetitle;
                if ($siteUseSitename) {
                    $seoProTitle[\'delimiter\'] = $siteDelimiter;
                    $seoProTitle[\'sitename\'] = $siteName;
                }
            }
            $title = implode(\' \', $seoProTitle);
        } else {
            $title = $modx->getOption(\'seopro.title_format\');
        }
        $modx->setPlaceholder(\'seoPro.title\', $title);
        break;
}',
      'locked' => 0,
      'properties' => 'a:0:{}',
      'disabled' => 0,
      'moduleguid' => '',
      'static' => 0,
      'static_file' => '',
    ),
  ),
  'policies' => 
  array (
    'MODX\\Revolution\\modAccessContext' => 
    array (
      'mgr' => 
      array (
        0 => 
        array (
          'principal' => 1,
          'authority' => 0,
          'policy' => 
          array (
            'about' => true,
            'access_permissions' => true,
            'actions' => true,
            'change_password' => true,
            'change_profile' => true,
            'charsets' => true,
            'class_map' => true,
            'components' => true,
            'content_types' => true,
            'countries' => true,
            'create' => true,
            'credits' => true,
            'customize_forms' => true,
            'dashboards' => true,
            'database' => true,
            'database_truncate' => true,
            'delete_category' => true,
            'delete_chunk' => true,
            'delete_context' => true,
            'delete_document' => true,
            'delete_eventlog' => true,
            'delete_plugin' => true,
            'delete_propertyset' => true,
            'delete_role' => true,
            'delete_snippet' => true,
            'delete_static_resource' => true,
            'delete_symlink' => true,
            'delete_template' => true,
            'delete_tv' => true,
            'delete_user' => true,
            'delete_weblink' => true,
            'directory_chmod' => true,
            'directory_create' => true,
            'directory_list' => true,
            'directory_remove' => true,
            'directory_update' => true,
            'edit_category' => true,
            'edit_chunk' => true,
            'edit_context' => true,
            'edit_document' => true,
            'edit_locked' => true,
            'edit_plugin' => true,
            'edit_propertyset' => true,
            'edit_role' => true,
            'edit_snippet' => true,
            'edit_static_resource' => true,
            'edit_symlink' => true,
            'edit_template' => true,
            'edit_tv' => true,
            'edit_user' => true,
            'edit_weblink' => true,
            'element_tree' => true,
            'empty_cache' => true,
            'error_log_erase' => true,
            'error_log_view' => true,
            'events' => true,
            'export_static' => true,
            'file_create' => true,
            'file_list' => true,
            'file_manager' => true,
            'file_remove' => true,
            'file_tree' => true,
            'file_unpack' => true,
            'file_update' => true,
            'file_upload' => true,
            'file_view' => true,
            'flush_sessions' => true,
            'frames' => true,
            'help' => true,
            'home' => true,
            'language' => true,
            'languages' => true,
            'lexicons' => true,
            'list' => true,
            'load' => true,
            'logout' => true,
            'mgr_log_view' => true,
            'mgr_log_erase' => true,
            'menu_reports' => true,
            'menu_security' => true,
            'menu_site' => true,
            'menu_support' => true,
            'menu_system' => true,
            'menu_tools' => true,
            'menu_trash' => true,
            'menu_user' => true,
            'menus' => true,
            'messages' => true,
            'namespaces' => true,
            'new_category' => true,
            'new_chunk' => true,
            'new_context' => true,
            'new_document' => true,
            'new_document_in_root' => true,
            'new_plugin' => true,
            'new_propertyset' => true,
            'new_role' => true,
            'new_snippet' => true,
            'new_static_resource' => true,
            'new_symlink' => true,
            'new_template' => true,
            'new_tv' => true,
            'new_user' => true,
            'new_weblink' => true,
            'packages' => true,
            'policy_delete' => true,
            'policy_edit' => true,
            'policy_new' => true,
            'policy_save' => true,
            'policy_template_delete' => true,
            'policy_template_edit' => true,
            'policy_template_new' => true,
            'policy_template_save' => true,
            'policy_template_view' => true,
            'policy_view' => true,
            'property_sets' => true,
            'providers' => true,
            'publish_document' => true,
            'purge_deleted' => true,
            'remove' => true,
            'remove_locks' => true,
            'resource_duplicate' => true,
            'resource_quick_create' => true,
            'resource_quick_update' => true,
            'resource_tree' => true,
            'resourcegroup_delete' => true,
            'resourcegroup_edit' => true,
            'resourcegroup_new' => true,
            'resourcegroup_resource_edit' => true,
            'resourcegroup_resource_list' => true,
            'resourcegroup_save' => true,
            'resourcegroup_view' => true,
            'save' => true,
            'save_category' => true,
            'save_chunk' => true,
            'save_context' => true,
            'save_document' => true,
            'save_plugin' => true,
            'save_propertyset' => true,
            'save_role' => true,
            'save_snippet' => true,
            'save_template' => true,
            'save_tv' => true,
            'save_user' => true,
            'search' => true,
            'set_sudo' => true,
            'settings' => true,
            'source_delete' => true,
            'source_edit' => true,
            'source_save' => true,
            'source_view' => true,
            'sources' => true,
            'steal_locks' => true,
            'tree_show_element_ids' => true,
            'tree_show_resource_ids' => true,
            'undelete_document' => true,
            'unlock_element_properties' => true,
            'unpublish_document' => true,
            'usergroup_delete' => true,
            'usergroup_edit' => true,
            'usergroup_new' => true,
            'usergroup_save' => true,
            'usergroup_user_edit' => true,
            'usergroup_user_list' => true,
            'usergroup_view' => true,
            'view' => true,
            'view_category' => true,
            'view_chunk' => true,
            'view_context' => true,
            'view_document' => true,
            'view_element' => true,
            'view_eventlog' => true,
            'view_offline' => true,
            'view_plugin' => true,
            'view_propertyset' => true,
            'view_role' => true,
            'view_snippet' => true,
            'view_sysinfo' => true,
            'view_template' => true,
            'view_tv' => true,
            'view_unpublished' => true,
            'view_user' => true,
            'workspaces' => true,
            'seosuite' => true,
            'seosuite_tab_meta' => true,
            'seosuite_tab_seo' => true,
            'seosuite_tab_social' => true,
          ),
        ),
      ),
    ),
  ),
);