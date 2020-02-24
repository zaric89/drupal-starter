
-README file for Frontend developers-
#####################################

-------------------------------------
This file contains main info for:

#1. Setting up the project
#2. Guidelines - CSS
#3. Guidelines - Javascript



#####################################
#1. Setting up the project


    Follow this steps:

	*******************************************************************************
	*
	*	Set your machine (only once):
	*
	*		1. Download node.js https://nodejs.org/en/download/
	*
	*			*** If use terminal ( command prompt ) use this aproach ***
	*				curl -sL https://deb.nodesource.com/setup_8.x | sudo -E bash -
	*				sudo apt-get install -y nodejs
	*
	*		2. Run command prompt
	*
	*		3. Install gulp globally - "npm install gulp -g"
	*
	*		4. Install rimraf globally - "npm install rimraf -g"
	*
	********************************************************************************

	Set your project:

	1. Run command prompt withing your project (theme) folder

	2. Install node_modules - "npm install"

	3. Build files - "gulp build"

	4. Generate fonticons - "gulp fonticons"

	5. Start gulp watch - "gulp watch"

		* you cannot run another task while in watch mode
		* to stop gulp watch - press ctrl+c, y, enter

#####################################
#2. Guidelines - CSS


    1.  You sholud use BEM syntax wherever possible.

            source => http://getbem.com/introduction/


    2.  We use "inuitcss" for files organization.

            source => https://github.com/inuitcss/inuitcss


    3.  All "inuitcss" files shold be imported from "node_modules" folder and new files should be organized by following "inuitcss" principles.
        All files should be imported into "styles.scss" file.


    4.  To add plugin which is not node module, download plugin's .scss files and place them inside "sass/libraries" folder.
        Import those files into "styles.scss" file.


    5.  To add plugin as node module (after installing it #1.5.), import it into "styles.scss" file, through relative or absolute path.


    6.  Use variables as much as you can (for colors, font families, values, ...).


    7.  Try to make lots of classes based on their function and structure, not by their purpose.
        Add those classes to the elements instead of repeating styles over and over again.
        If it is not possible to add those classes, use @extend.
        That way the same class is used for same stylings, no need for duplicating styles.


    8.  For CSS checking we use "stylelinter".
        There should be file ".stylelintrc" next to "gulpfile.js" file, in which are described all the rules which "stylelinter" uses.

        We use "stylelint-config-standard" rules at the moment with some other modifications.
        It will list all the errors inside terminal window, separated by partials, error lines and error messages, for easier debugging.

        gulp css-lint

            source => https://stylelint.io/user-guide/rules/


    9.  To disable line, file or block from checking by "stylelinter":

        /* stylelint-disable-line */    <-- to disable line, add at the end of the line

        /* stylelint-disable */         <-- disables code below, put at the top of the file if you want to disable whole file (don't close it)
        a {}
        /* stylelint-enable */          <-- enables code below


    10. File "styles.scss" is compiled and minimized and written into "dest/css" folder.



#####################################
#3. Guidelines - Javascript


    1.  We use ES6 (javascript specification).

        source => http://ccoenraets.github.io/es6-tutorial/
        source => https://github.com/airbnb/javascript


    2.  Global variables are listed on top of the page.


    3.  To add plugin which is not node module, download plugin's .js files and put them inside js folder.
        Import them inside "gulpfile.js" file at "scripts" task, in desired order.


    4.  To add plugin as node module (after installing it #1.5.), import it at the top of "main.js" file, after globals.

        ----------------------------------------------------------------
        - Example with relative path:

        import ScrollReveal from 'scrollreveal';

        ----------------------------------------------------------------
        - Example with absolute path:

        import '../node_modules/scrollnav/dist/jquery.scrollnav.min.js';


    5.  For Javascript checking we use "ESlint".
        There should be file ".eslintrc" next to "gulpfile.js" file, in which are described all the rules which "ESlint" uses.

        We use "airbnb-base" rules at the moment with some other modifications.
        It will list all the errors inside terminal window, error lines and error messages, for easier debugging.

        gulp js-lint

            source => https://eslint.org/docs/rules/
            source => https://github.com/airbnb/javascript


    6.  To disable line, file or block from checking by "ESlinter":

        // eslint-disable-line  <-- to disable line, add at the end of the line

        /* eslint-disable*/     <-- disables code below, put at the top of the file if you want to disable whole file (don't close it)
        ... code that violates rule ...
        /* eslint-enable */     <-- enables code below


    7.  Javascript files are concatinated, compiled, minimized and written into "dest/js" folder.

#####################################
#4. Guidelines - MJML plugin (email template)


    1.  Install mjml plugin globally via npm using: npm install -g mjml.


    2.  Navigate to the location of the *.mjml file and run mjml -r *.mjml -o *.html.twig, where * is name of the file.


    3.  For continious watch of file change during the development of the email template run mjml --watch *.mjml -o *.html.twig, where * is name of the file.

