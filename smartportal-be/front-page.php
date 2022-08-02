<?php
// Display a temporary front page for languages that were not implemented yet
define('ICL_LANGUAGE_CODE', 'fr');

if (ICL_LANGUAGE_CODE == 'fr' || ICL_LANGUAGE_CODE == 'nl') {
  include TEMPLATEPATH . '/front-page.php';
} else {
  include TEMPLATEPATH . '/page-blank.php';
}
?>