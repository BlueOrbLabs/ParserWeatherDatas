<?php
// Autochargement des classes, inclusion automatique des fichiers php
function autoload($classname)
{
  if (file_exists($file = __DIR__ . '/class/' . $classname . '.php'))
  {
    require $file;
  }
}
spl_autoload_register('autoload');

