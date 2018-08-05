# Cash Machine with Lumen Framework

## Prerequisites:
- PHP >= 7.1.3
- Lumen 5.6.3
- Mod Rewrite Enabled


## Deployment:
- Extract provided zip file
- Paste extracted directory into your apache root directory. ex: /var/www/html/
- Run composer install, to cover all dependencies (if you dont have all vendors inside `vendors/` directory)

> $ composer install 


## Sample Request:
- URL: http://localhost/project/api/withdraw
- METHOD: POST
- JSON REQUEST: {"amount":"230"}


## Tests
Go to project directory in terminal and execute below command:

> $ vendor/bin/phpunit


## Tested Results:
We have following tests in place, which are successfully executed.

Entry: 30.00
Result: [20.00, 10.00]

Entry: 80.00
Result: [50.00, 20.00, 10.00]

Entry: 125.00
Result: throw NoteUnavailableException

Entry: -130.00
Result: throw InvalidArgumentException

Entry: NULL
Result: [Empty Set]


## API Documentation
API documentation is provided inside apidoc/index.html file for details

Note: You may also regenerate by using below command:

> $ sudo npm install apidoc -g   # If not already installed

> $ apidoc -i app/Http/Controllers/ -o apidoc/


## Main Files and Directory Structure:


-------- apidoc/

	------- index.html

-------- app/

	--- Http/

	----------- Controllers/

	----------------------- WithdrawController.php

	--- Facade/

	----------- WithdrawFacade.php

	--- Helpers/

	----------- NoteHelpers.php

	----------- FormattingHelpers.php

--------- config/

	-------- app.php

--------- routes/

	--------- web.php

--------- tests/

	--------- WithdrawNotesTest.php

--------- .env

--------- README.md



Cheers !
