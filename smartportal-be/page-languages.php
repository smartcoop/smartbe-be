<?php
if (isset($_COOKIE['_icl_current_language'])) {
  // If the site has already been visited in French, redirect to /fr
  if ($_COOKIE['_icl_current_language'] == 'fr') {
    header('Location: /fr');
    exit;
  }
  
  // If the site has already been visited in Dutch, redirect to /nl
  elseif ($_COOKIE['_icl_current_language'] == 'nl') {
    header('Location: /nl');
    exit;
  }
  
  // If the site has already been visited in English, redirect to /en
  elseif ($_COOKIE['_icl_current_language'] == 'en') {
    header('Location: /en');
    exit;
  }
  
  // If the site has already been visited in German, redirect to /de
  elseif ($_COOKIE['_icl_current_language'] == 'de') {
    header('Location: /de');
    exit;
  }
}
?>

<?php
/*
Template Name: Choose a language page
*/

get_header(); ?>

<div id="content" role="main" class="container">
  <article>

    <!--
    <div class="row">
      <div class="span6">
        <div class="language-column language-column-left">
          <h1><?php _e('Bonjour,', 'smartbe') ?></h1>
          <p><?php _e('Choose language introduction text in French', 'smartbe') ?></p>
          <a href="/fr" class="btn btn-primary btn-filled"><?php _e('Je parle Français', 'smartbe') ?></a>
        </div>
      </div>

      <div class="span6">
        <div class="language-column language-column-right">
          <h1><?php _e('Hallo,', 'smartbe') ?></h1>
          <p><?php _e('Choose language introduction text in Dutch', 'smartbe') ?></p>
          <a href="/nl" class="btn btn-primary btn-filled"><?php _e('Ik spreek Nederlands', 'smartbe') ?></a>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="span6">
        <div class="language-column language-column-left">
          <h1><?php _e('Hello,', 'smartbe') ?></h1>
          <p><?php _e('Choose language introduction text in English', 'smartbe') ?></p>
          <a href="/en" class="btn btn-primary btn-filled"><?php _e('I speak English', 'smartbe') ?></a>
        </div>
      </div>
      
      <div class="span6">
        <div class="language-column language-column-right">
          <h1><?php _e('Hallo,', 'smartbe') ?></h1>
          <p><?php _e('Choose language introduction text in German', 'smartbe') ?></p>
          <a href="/de" class="btn btn-primary btn-filled"><?php _e('Ich spreche Deutsch', 'smartbe') ?></a>
        </div>
      </div>
    </div>
    -->
    
    <div class="row">
      <div class="span6">
        <div class="language-column text-center">
          <h1><?php _e('Bonjour,', 'smartbe') ?></h1>
          <p><?php _e('Choose language introduction text in French', 'smartbe') ?></p>
          <a href="/fr" class="btn btn-primary btn-filled"><?php _e('Je parle Français', 'smartbe') ?></a>
        </div>
      </div>

      <div class="span6">
        <div class="language-column text-center">
          <h1><?php _e('Hallo,', 'smartbe') ?></h1>
          <p><?php _e('Choose language introduction text in Dutch', 'smartbe') ?></p>
          <a href="/nl" class="btn btn-primary btn-filled"><?php _e('Ik spreek Nederlands', 'smartbe') ?></a>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="span6">
        <div class="language-column text-center">
          <h1><?php _e('Hello,', 'smartbe') ?></h1>
          <p><?php _e('Choose language introduction text in English', 'smartbe') ?></p>
          <a href="/en" class="btn btn-primary btn-filled"><?php _e('I speak English', 'smartbe') ?></a>
        </div>
      </div>
      
      <div class="span6">
        <div class="language-column text-center">
          <h1><?php _e('Hallo,', 'smartbe') ?></h1>
          <p><?php _e('Choose language introduction text in German', 'smartbe') ?></p>
          <a href="/de" class="btn btn-primary btn-filled"><?php _e('Ich spreche Deutsch', 'smartbe') ?></a>
        </div>
      </div>
    </div>

  </article>
</div>

<?php get_footer(); ?>