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
    *classes folder : has the classes that represent each item/table from the db.
    *model: has the files to connect and communicate with the db - business logic
    *views: has the html files that display the user interface ( header.html, home.html, etc)
    *index.php that receive user requests, get data from the model, and return views

- Routes all URLs and leverages a templating language using the Fat-Free framework.
    The index.php file has the needed routes, rendering to the correct path using Fat-Free framework

- Has a clearly defined database layer using PDO and prepared statements.
    Each function in the db-functions file has defined the needed steps: prepare the query, prepare the statement,
     bind parameters , execute statement and return.

- Data can be viewed, added, updated, and deleted.
    The data base has different tables where the user can request (view) information from the different items: toys,
    furniture,vets and food. Also, he/she can add new items, update existing information by recommending specific items
    and delete items from the db.
    A general user (not login needed) can only view information and recommend items (update).
    In order to add and delete information from the db, the user must login.
    User with access level=0, can add information and user with access level grater than 0 can add and delete too.

- Has a history of commits from both team members to a Git repository.
    Github has commits from both team members:
    * https://github.com/Bessyto/cat-wishes

- Uses OOP, and defines multiple classes, including at least one inheritance relationship.
    Multiples classes are defined.
    * The classes Food, Furniture, Toys and Vets extend the Basic Object class, that represents the general behaviour
      of the object.
    * The interface iViewable is implemented by the classes Food, Furniture and Toys.
    * The member class represents each user object of the cat-wishes website.
    * The DBObject class is the basic class for connecting to the database.
    * The DBItem class extends DBObject adding the ability to get an item.

- Contains full Docblocks for all PHP files.
    Each document has DocBlocks, header with the file description and purpose, and some comments.

- Has full validation on the client side through JavaScript and server side through PHP.

- Incorporates jQuery and Ajax.
    JQuery: Used in the Login option in the nav bar. When user click Login button, the input options to write username
    and password will prompt to the user with the button Submit. The user also will have the option to Logout.

    Ajax: Our ajax is contained in scripts/rank-scripts used by rank.html. It is invoked whenever a user clicks on
    a recommended item. It calls the details.php file (which makes a call to the database). The html returned by
    details.php is then displayed in place of the recommended items without reloading the whole page.

- BONUS:  Utilizes an API:
    Cat-Wishes presents in the nav bar under the link "Adopt a Cat" the option where the user is render
    to a new page where a zip code is required to search for cats that are available to adopt, in that specific area.
    The Cat-Wishes project utilizes an API from petfinder.com , and registration was necessary in order to
    get a key.