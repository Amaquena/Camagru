# Camagru

This web project is challenging us to create a small web application in php that allow us to make basic photo editing using your webcam and some predefined images. App users should be able to select an image in a list of superposable images, take a picture with his/her webcam and admire the result that should be mixing both pictures.

### General instructions
- PHP must be used for the server-side with it's standard library.
- Client-side should use HTML, CSS and javascript.
- Every framework, micro-framework or library not personally created are forbidden.
- The PDO abstraction driver is required for database communication. The Error mode for the driver should be set to PDO::ERRMODE_EXCEPTION
- The application should be free of any security leaks, for this project at least those mentioned in the [common fearures](###Common-features "Goto Common featres") common fearures section should be covered.

### Common features
- The website should have a decent page layout (meaning at least a header, a main section and a footer).
- The website should be responsive.
- All forms should be validated.
- These security features should be implemented:
    - Store Encrypted passwords in the database.
    - Prevent the ability to inject HTML or “user” JavaScript in badly protected variables.
    - Prevent the ability to upload unwanted content on the server.
    - Prevent the possibility of altering an SQL query.
    - Prevent the ability to use an extern form to manipulate so-called private data

### User features
- A signup page that requires a valid email address, a username and a password with at least a  minimum level of complexity.
- A user should be able to comfirm his/her account via a unique link sent via email.
- A user should sign in with his/her her username and password.
- A user should be able to change his/her password if they forgotten it.
- The user should be able to disconnect with one click from any page.
- Once connected the use should be able to modify his/her personal info.

### Gallery features
- This part is public and can be accessed whether a user has an account or not.
- Only users with accounts should be able to comment and like uploaded content.
- Content should be ordered by date.
- If a comment is made on an image the uploader should recieve an email notification.
    - This feature is enabled by default and can be deactivated if the user's preferences.
- Must be paginated with at least 5 elements per page.

### Editing features
- Should only be accessible by a user that authenticated thier account via email.
- This page should contain 2 sections:
    - A main section containing the preview of the user’s webcam, the list of superposable images and a button allowing to capture a picture.
    - A side section displaying thumbnails of all previous pictures taken.
- The button to take the image should be inactive till a superposable image is selected.
- Creation of the image should be done server-side NOT client-side.
- User should be able to upload an image if there is no webcam is availble.
- Deletion of created images should be available, but only those own by the user.

### Some extra specifications
- Your project should contain imperatively:
    - A index.php file, containing the entering point of your site and located at the root of your file hierarchy.
    - A config/setup.phpfile, capable of creating or re-creating the database schema, by using the info cintained in the file config/database.php.
    - A config/database.php file, containing your database configuration, that will be instanced via PDO in the following format:
    ```PHP
    <?php
        $DB_DSN = ...;
        $DB_USER = ...;
        $DB_PASSWORD = ...;
    ```
    
