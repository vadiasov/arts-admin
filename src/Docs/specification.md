# Package vadiasov/arts-admin specification
## Interaction
1.Example with Album:
### Arts uploading (we use vadiasov/upload package)
* Music album needs in arts
* We are on the Album page. We click on button "Upload Arts" and go to "Upload page".
* Upload page has drop zone.
* Drug and drop files.
* Files goes through validation.
* If validation is ok file thumb has check sign.
    * Otherwise file thumb has christ sign.
* If validation of file is ok this one is saved into a server and filename is saved into appropriate DB table.
* We click on the button "Back" and we go to the index page of Album Arts.
* Album Arts index page has ordering button

### Arts CRUD actions
* We are on the Album page. We click on button "Arts index" and to the index page of Album Arts.
* Index page has standard structure and gives all CRUD availabilities.
* One of the images is an album cover.

2.Example with Track:
### Arts uploading (we use vadiasov/upload package)
* Music track needs in arts
* We are on the Tracks index page. We click on a button "Upload Arts" and go to "Upload page".
* Upload page has drop zone.
* Drug and drop files.
* Files goes through validation.
* If validation is ok file thumb has check sign.
    * Otherwise file thumb has christ sign.
* If validation of file is ok this one is saved into a server and filename is saved into appropriate DB table.
* We click on the button "Back" and we go to the index page of Album Arts.
* Track Arts index page has ordering button

### Arts CRUD actions
* We are on the tracks index page. We click on a button "Arts index" and to the index page of Track Arts.
* Index page has standard structure and gives all CRUD availabilities.
* One of the images is a track cover.

## Requirements
* we need to pass into the package:
    * validation rules
    * directory to save real files
    * DB table name
    * is it album arts or track arts
    * action/route etc to come back from package
    
## Additional development
* Config for uploading from Albums
* Button "Add Arts" in each rows of index Albums
* Button "Show index Arts" in each rows of index Albums
* Config for uploading from Tracks
* Button "Add Arts" in each rows of index Tracks
* Button "Show index Arts" in each rows of index Tracks
* Button "Ordering" in index Arts
* Ordering package: add view file for images


