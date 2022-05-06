# BetterSaveResources
Have you ever wanted to save your plugin resources to special folder But because of it's stupid api, you didn't do that?
With this plugin, Which is for pocketmine-mp servers, You can save your plugin resources to the path you want.
In default you can only save your plugin resources with below code which you won't be able to save them into special paths! It just save them to the plugin data folder...
```PHP 
$this->saveResource(string $filename, bool $replace = false); # Default function
```
But what if you want to save them into special paths? So then you need this library for that! With installing this library & using it in your plugin main file, It changes default <code>saveResource()</code> function of your server and adds new argument into it! Then you can use it like below code:
```PHP
$this->saveResource(string $filename, bool $replace = false, string $path = '');
```

# How to install
1. Download <a href="https://poggit.pmmp.io/p/Devirion">Devirion</a> & put it in your <code>plugins</code> folder.
2. Run your server to create <code>virions</code> folder automatically.
3. Download <a href="https://poggit.pmmp.io/ci/HighestDreams/BetterSaveResources/~">BetterSaveResources</a> and paste it in your <code>virions</code> folder.
4. Now everything is ready to use.

# How to use
Just use trait into your plugin main file:
For example: 
```PHP
<?php

namespace Your\Plugin\Namespace;

use pocketmine\plugin\PluginBase;

class Main extends PluginBase
{
    use \better\pmmp\SaveResources; # Only thing you need is just this!
    
    protected function onEnable(): void
    {
      // Your codes...
    }
}
```
* NOTE: You must use it just into your plugin main file! Don't need to use it in every single php file of your plugin.

Then you can use it like what i said above, For example:
```PHP
$file = 'Test.png'; # This is in your plugin <code>resources</code> folder.
$replace = false; # Set it to true if you want replace existed files.
$path = $this->getDataFolder() . 'TestFolder'; # Path to the where you want to save the resource, Don't use this argument if you want save it in plugin data folder
$this->saveResource($file, $replace, $path);
```
