# Database-Management-System-on-Entertainment-Media- #
This project is an end to end system which allows us to browse relevant data for movies and tv shows provided in the IMDB dataset. We have utilized Python, MySQL, PHP, Bootstrap, HTML and CSS to implement this web-based system.

The raw dataset provided contains redundant and null value information that needs to be removed. Furthermore the dataset attributes need to segregated according to the relationship scheme constructed in the previous step. Each TSV file containing the raw dataset is first converted into a CSV file using a python script. Once converted into a CSV file, it is further modified to only keep the required attributes. Finally each CSV file is then used to load the dataset onto the MySQL server.

The tables and the primary keys are generated. The data is then uploaded using ‘LOAD DATA INFILE <file> INTO TABLE’ command in MySQL.This ensures that the dataset is populated and ready for querying.

System was developed and unit testing was conducted while developing each of the components required. Development was done in HTML, CSS, Bootstrap and PHP.
