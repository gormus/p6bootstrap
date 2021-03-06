# P6Bootstrap
The *P6Bootstrap* theme is a customized sub-theme for the Drupal [Bootstrap](https://www.drupal.org/project/bootstrap) base-theme using Bootstrap's Saas version instead of its default LESS.

## Minimum Requirements
1. [Bootstrap](https://www.drupal.org/project/bootstrap) theme. (7.x-3.0 or higher)
2. [jQuery Update](https://drupal.org/project/jquery_update)

## Quick Start
Download bootstrap base theme and p6bootstrap sub-theme, and extract to site's theme folder.

$ `bower install`

$ `npm install`

$ `grunt firsttime`

$ `grunt`

## Recommended
The theme utilizes **Bower** to manage packages, and **Grunt** to automate tasks.

If you need to make changes to theme's style-sheet and JavaScript files, you will need to have **Bower** and **Grunt** installed on the development machine.

## Installation
1. Download and extract the [Bootstrap](https://www.drupal.org/project/bootstrap) base-theme and [P6Bootstrap](https://github.com/gormus/p6bootstrap) sub-theme in `sites/all/themes` or a similar `sites/*/themes` folder.

2. Ensure that jQuery has been configured to meet Bootstrap's minimum version requirement.


**Following steps are only required if you plan to customize Sass and JavaScript files.**

### Install Bower
Bower is a command line utility. Install it globally with npm.

$ `npm install -g bower`

Bower requires [Node and npm](http://nodejs.org/) and [Git](http://git-scm.org/).

For more information on Bower, visit http://bower.io/#getting-started
Install dependencies via Bower.

Following command would generate *bower_components* folder and download all required packages automatically:

$ `bower install`

### Install Grunt
To install Grunt, you must **first [download and install node.js](http://nodejs.org/download/)** (which includes npm). npm stands for [node packaged modules](http://npmjs.org/) and is a way to manage development dependencies through node.js.

Then, from the command line:
1. Install `grunt-cli` globally with `npm install -g grunt-cli`.

2. Navigate to the **p6bootstrap** directory (i.e. `sites/all/themes/p6bootstrap`), then run` npm install`. npm will look at the `package.json` file and automatically install the necessary local dependencies listed there.

When completed, you'll be able to run the various Grunt commands provided from the command line.

$ `npm install`

Initialize files. Following command would copy required files into appropriate folders for later preprocessing.

$ `grunt firsttime` (one time only)

## Usage / Available Grunt commands
### `grunt firsttime`
Copies required fonts and variables file.

Caution: Re-running this task would overwrite `p6bootstrap/fonts/bootstrap/*` and `p6bootstrap/sass/_bootstrap_variables.scss` files.

### `grunt server`
Runs the server and opens up the kitchen-sink.html in the browser. It is a quick preview of everything Bootstrap has to offer.

### `grunt`
The default task; compiles and minifies CSS and JavaScript.

## Troubleshooting
Should you encounter problems with installing dependencies or running Grunt commands, first delete the `/node_modules/`directory generated by npm. Then, rerun `npm install`.

## Further Reading
* **[Bootstrap](http://getbootstrap.com/)** is the most popular HTML, CSS, and JS framework for developing responsive, mobile first projects on the web.
* **[Bower](http://bower.io/)**, a package manager for the web.
* **[Sass](http://sass-lang.com/)** is the most mature, stable, and powerful professional grade CSS extension language in the world.
* **[Bootstrap sub-theming "how to"](http://drupal.org/node/1978010)**
