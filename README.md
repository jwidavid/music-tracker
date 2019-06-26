Using Laravel(5.7 or higher), create an application to keep track of your favorite bands and albums. 


DETAILS:

1_ You should create both "Band" and "Album" database tables and models.    DONE

2_ All database tables should be created via Laravel migrations.    DONE

3_ All database tables should be populated with example data via Laravel seed classes.

4_ Your application should consist of the following pages:  DONE
- Band list page - List all bands (HOMEPAGE).
- Album list page - List all albums. 

5_ Include a "HTML select" field that contains all bands and can be used to filter the current list of Albums by Band.

6_ On both list pages, each item listed should contain edit and delete links.

7_ On both list pages, you should be able to sort the columns that are displaying by clicking on the column name. 

8_ If you click the delete button on an album, the application should delete the album. 

9_ If you click the delete button on a band, the application should delete all albums that belong to that band and then it should delete the band. 

10_ If you click the edit link for any list item you should be taken to an edit page for that item. There you should be able to edit any of the fields on the item. 

11_ Use Laravel relationships to tie the band model to the album model and the album model to the band model.   DONE

12_ Use Laravel relationships to display the band name on album detail/edit page.

13_ Use Laravel relationships to display the album names for a band on the band detail/edit page.

14_ For the band create/edit page, “name” should be required.

15_ For the album create/edit page, you should have to select a band via a select box which should be required. The “name” field should also be required.

16_ Band table should have at least the following fields:   DONE
- name 
- start_date 
- website 
- still_active 

17_ Album table should have at least the following fields:  DONE
- band_id 
- name 
- recorded_date 
- release_date 
- number_of_tracks 
- label 
- producer 
- genre
