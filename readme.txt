    IT-328
    readme.txt
    Cat-Wishes Final Project
    Melanie Felton
    Bessy Torres-Miller
    IT-328

This file describes how each of the following requirements are implemented in Cat-Wishes project
------------------------------------------------------------------------------------------------------------------------

- Separates all database/business logic using the MVC pattern.
    Cat-wishes structure has different folders to separate the files according to their type.
    *classes folder : has the classes that represent each item/table from the db. (business logic)
    *model: has the files to connect and communicate with the db - (database logic)
    *views: has the html files that display the user interface ( header.html, home.html, etc)
    *index.php (and subfiles - recommendBuilder.php, top5toys.php, and userLogin.php)
        receives user requests, get data from the model, and return views

- Routes all URLs and leverages a templating language using the Fat-Free framework.
    The index.php file has the needed routes, rendering to the correct path using Fat-Free framework

- Has a clearly defined database layer using PDO and prepared statements.
    The models folder contains the class DBObject and it's children- DBItem, DBItems, and DBMembers.
    Each function in the classes has defined the needed steps: prepare the query, prepare the statement,
     bind parameters , execute statement and return.

- Data can be viewed, added, updated, and deleted.
    The data base has different tables where the user can request (view) information from the different items: toys,
    furniture, vets and food. Depending on his membership level, he/she can add new items, update existing
    information by recommending specific items and delete items from the db.

    A general user (no login needed) can only view information and recommend existing items (update).
    In order to add and delete information from the db, the user must login.
    User with access level at least equal to 0, can add new 'items'. If the user's access level is greater
    than 0, then can delete, too.

- Has a history of commits from both team members to a Git repository.
    Much of the work was done using pair programming. Github has commits from both team members:
    GITHUB repository - https://github.com/Bessyto/cat-wishes

- Uses OOP, and defines multiple classes, including at least one inheritance relationship.
    Multiples classes are defined.
    * The classes Food, Furniture, Toys and Vets extend the Basic Object class, that represents the general behaviour
      of the object.
    * The interface iViewable is implemented by the classes Food, Furniture and Toys.
    * The member class represents each user object of the cat-wishes website.
    * The DBObject class is the basic class for connecting to the database.
    * The DBItem, DBItems, and DBMembers classes extend DBObject adding relevant database abilities.

- Contains full Docblocks for all PHP files.
    Each document has DocBlocks, header with the file description and purpose, and some comments.

- Has full validation on the client side through JavaScript and server side through PHP.
    *User login and password are checked to be just a string of alphabet characters before querying
    for a match in the database.
    *Names and descriptions are validated to make sure that they don't contain problematic html
    tags with client side javascript. Php is used to validate the names and descriptions on the
    server side.
    *Image is checked for size and type by javascript. If the user trys to upload, php prevents images
    of the wrong size and type from upload. Images with duplicate names to existing images are renamed
    before uploading and entering the name in the database.
    *Delete and Recommend checks the item(s) chosen against items available.

- Incorporates jQuery and Ajax.
    JQuery: Used in the Login option in the nav bar. When the user clicks Login button, the input options
    to write username and password will prompt the user with the button Submit. After logging in, the
    user has the option to Logout.

    Ajax: Our ajax is contained in scripts/rank-scripts used by rank.html. It is invoked whenever a user clicks on
    a recommended item. It calls the details.php file (which makes a call to the database). The html returned by
    details.php is then displayed in place of the recommended items without reloading the whole page.

- BONUS:  Utilizes an API:
    Cat-Wishes offers iteraction with the PetFinder API via the nav bar link "Adopt a Cat".
    The user is taken to the page where a zip code is required to search for cats that are available
    to adopt, in that specific area. As stated above, the Cat-Wishes project utilizes an API from
    petfinder.com. Registration was necessary in order to get a key. The JSON structure was not specified
    in the API and utilizes a fairly deep structure with multiple images for different sizes.