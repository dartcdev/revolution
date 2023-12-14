<?php  return array (
  'resourceClass' => 'MODX\\Revolution\\modDocument',
  'resource' => 
  array (
    'id' => 4,
    'type' => 'document',
    'pagetitle' => 'Заглушка',
    'longtitle' => '',
    'description' => '',
    'alias' => 'stub',
    'link_attributes' => '',
    'published' => 1,
    'pub_date' => 0,
    'unpub_date' => 0,
    'parent' => 0,
    'isfolder' => 0,
    'introtext' => '',
    'content' => '',
    'richtext' => 1,
    'template' => 14,
    'menuindex' => 1,
    'searchable' => 1,
    'cacheable' => 1,
    'createdby' => 1,
    'createdon' => 1702497291,
    'editedby' => 1,
    'editedon' => 1702502880,
    'deleted' => 0,
    'deletedon' => 0,
    'deletedby' => 0,
    'publishedon' => 1702497300,
    'publishedby' => 1,
    'menutitle' => '',
    'donthit' => 0,
    'privateweb' => 0,
    'privatemgr' => 0,
    'content_dispo' => 0,
    'hidemenu' => 0,
    'class_key' => 'MODX\\Revolution\\modDocument',
    'context_key' => 'web',
    'content_type' => 1,
    'uri' => 'stub.html',
    'uri_override' => 0,
    'hide_children_in_tree' => 0,
    'show_in_tree' => 1,
    'properties' => NULL,
    'alias_visible' => 1,
    '_content' => '<!doctype html>
<html lang="uk">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<link rel="apple-touch-icon" sizes="180x180" href="{$_modx->config.template_path}img/favicon/apple-touch-icon.png" />
		<link rel="icon" type="image/png" sizes="32x32" href="{$_modx->config.template_path}img/favicon/favicon-32x32.png" />
		<link rel="icon" type="image/png" sizes="16x16" href="{$_modx->config.template_path}img/favicon/favicon-16x16.png" />
		<link rel="manifest" href="{$_modx->config.template_path}img/favicon/site.webmanifest" />
		<link rel="mask-icon" href="{$_modx->config.template_path}img/favicon/safari-pinned-tab.svg" color="#5bbad5" />
		<meta name="msapplication-TileColor" content="#ffffff" />
		<meta name="theme-color" content="#ffffff" />
		<link rel="stylesheet" href="{$_modx->config.template_path}css/tailwind.css?v=1" />
		<link rel="stylesheet" href="{$_modx->config.template_path}css/all-pages.css" />
		<title>{$_modx->config[\'site_name\']}</title>
	</head>
	<body class="body">
		<main class="main" id="main">
			<section class="h-full w-full bg-[#231F20] py-10">
				<div class="mx-auto flex h-full max-w-[660px] flex-col items-center justify-center gap-6 px-6 md:gap-10 md:px-4">
					<img src="{$_modx->config.template_path}img/icons-content/logo.svg" width="660" height="220" alt="Логотип: {$_modx->config[\'site_name\']}" />
					<a class="group flex h-10 w-full items-center justify-center rounded-lg border border-solid border-white transition duration-200 hover:bg-white md:h-20 md:rounded-2xl md:border-2" href="mailto:{$_modx->config.mail}"><span class="text-xl text-white transition duration-200 group-hover:text-[#231F20] md:text-2xl">{$_modx->config.mail}</span></a>
				</div>
			</section>
		</main>
	</body>
</html>',
    '_isForward' => false,
  ),
  'contentType' => 
  array (
    'id' => 1,
    'name' => 'HTML',
    'description' => 'HTML content',
    'mime_type' => 'text/html',
    'file_extensions' => '.html',
    'icon' => '',
    'headers' => NULL,
    'binary' => 0,
  ),
  'policyCache' => 
  array (
  ),
  'sourceCache' => 
  array (
    'MODX\\Revolution\\modChunk' => 
    array (
      'tplAlternateWrapper' => 
      array (
        'fields' => 
        array (
          'id' => 9,
          'source' => 0,
          'property_preprocess' => false,
          'name' => 'tplAlternateWrapper',
          'description' => 'The default chunk used for wrapping alternate links',
          'editor_type' => 0,
          'category' => 9,
          'cache_type' => 0,
          'snippet' => '[[+output]]',
          'locked' => false,
          'properties' => 
          array (
          ),
          'static' => false,
          'static_file' => '',
          'content' => '[[+output]]',
        ),
        'policies' => 
        array (
          'web' => 
          array (
          ),
        ),
        'source' => 
        array (
        ),
      ),
    ),
    'MODX\\Revolution\\modSnippet' => 
    array (
      'seosuiteMeta' => 
      array (
        'fields' => 
        array (
          'id' => 35,
          'source' => 0,
          'property_preprocess' => false,
          'name' => 'SeoSuiteMeta',
          'description' => 'Snippet for adding the title and meta description in your website.',
          'editor_type' => 0,
          'category' => 9,
          'cache_type' => 0,
          'snippet' => 'use Sterc\\SeoSuite\\Snippets\\Meta;

$meta = new Meta($modx);

return $meta->process($scriptProperties);',
          'locked' => false,
          'properties' => 
          array (
          ),
          'moduleguid' => '',
          'static' => false,
          'static_file' => '',
          'content' => 'use Sterc\\SeoSuite\\Snippets\\Meta;

$meta = new Meta($modx);

return $meta->process($scriptProperties);',
        ),
        'policies' => 
        array (
          'web' => 
          array (
          ),
        ),
        'source' => 
        array (
        ),
      ),
    ),
    'MODX\\Revolution\\modTemplateVar' => 
    array (
    ),
  ),
);