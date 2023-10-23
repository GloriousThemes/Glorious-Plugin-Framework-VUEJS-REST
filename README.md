# Glorious Plugin Framework + VUEJS + REST
 A plugin framework for GloriousMotive using VUEJS + REST API with WordPress
 A WordPress boilerplate plugin with Vue.js

#### A simple boilerplate plugin for WordPress using vue js

## How to use

* Clone this repository on your local `plugin folder`
* Delete the Vendor/Composer folder
* Delete the Codes from assets/js - all javascript files
* SEARCH for `` and Replace with your `Plugin Variables`. Follow the Case Styling.
* Run Command `composer dump-autoload`
* Run command `npm i` to install node modules.

Now just setup for your own plugin, it's very easy using node auto command.



## Step to make your own plugin

* Open with an IDE (Vscode, sublime, PhpStorm etc)

* Change all the   `plugin_name` to Your-Plugin-Name
* Change all the   `PLUGINNAME`  to YOURPLUGINNAME    (Upper case)
* Change all the   `PluginName`  to YourPluginName    (Upper Camel Case)
* Change all the   `Plugin_Name` to your_plugin_name
* Change all the   `textdomain`  to yourtextdomain

</details>

## All done have fun

#### Now your plugin is ready to use with a standard format

#### You can write vue.js codes inside `/src` folder

#### Do any customization you need

 For more details please check the `package.json` file

### After Development Production

 When your Plugin development is complete and you want to use it for production. Then run `npm run production` after that you can delete some files which are already build.

 Files/Folder you should delete on production:

* node modules
* src
* package-lock.json

 <hr>