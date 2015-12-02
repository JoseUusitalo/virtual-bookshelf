INSERT INTO `publishers` (PublisherID, PublisherName) VALUES (1, "julkaisija1");
INSERT INTO `publishers` (PublisherID, PublisherName) VALUES (2, "julkaisija2");
INSERT INTO `publishers` (PublisherID, PublisherName) VALUES (3, "julkaisija3");
INSERT INTO `publishers` (PublisherID, PublisherName) VALUES (4, "julkaisija4");
INSERT INTO `publishers` (PublisherID, PublisherName) VALUES (5, "julkaisija5");
INSERT INTO `publishers` (PublisherID, PublisherName) VALUES (6, "julkaisija6");

INSERT INTO `languages` (LanguageID, LanguageName) VALUES (1, "suomi");
INSERT INTO `languages` (LanguageID, LanguageName) VALUES (2, "englanti");
INSERT INTO `languages` (LanguageID, LanguageName) VALUES (3, "ruotsi");


INSERT INTO `products` (ProductID, Name, ReleaseDate, ImagePath, LanguageID, Brief, Description, EAN13, PublisherID) VALUES (1,'nimi1','2008-11-11','tekstiä',1,'turhaa','jotain',0000000000000,3);
INSERT INTO `products` (ProductID, Name, ReleaseDate, ImagePath, LanguageID, Brief, Description, EAN13, PublisherID) VALUES (2,'nimi2',NULL,'Lorem',2,'Ut','enim',0000000000001,1);
INSERT INTO `products` (ProductID, Name, ReleaseDate, ImagePath, LanguageID, Brief, Description, EAN13, PublisherID) VALUES (3,'nimi3','2018-12-11','ipsum',3,'ad','minim',0000000000002,2);
INSERT INTO `products` (ProductID, Name, ReleaseDate, ImagePath, LanguageID, Brief, Description, EAN13, PublisherID) VALUES (4,'nimi4','2009-11-11','NULL',1,'veniam','quis',0000000000003,1);
INSERT INTO `products` (ProductID, Name, ReleaseDate, ImagePath, LanguageID, Brief, Description, EAN13, PublisherID) VALUES (5,'nimi5','2007-11-11','sit',2,'nostrud','exercitation',0000000000004,NULL);
INSERT INTO `products` (ProductID, Name, ReleaseDate, ImagePath, LanguageID, Brief, Description, EAN13, PublisherID) VALUES (16,'nimi6','2006-11-11','amet',NULL,'NULL','laboris',NULL,3);
INSERT INTO `products` (ProductID, Name, ReleaseDate, ImagePath, LanguageID, Brief, Description, EAN13, PublisherID) VALUES (17,'nimi7','2005-11-11','consectetur',1,'nisi','ut',0000000000006,3);
INSERT INTO `products` (ProductID, Name, ReleaseDate, ImagePath, LanguageID, Brief, Description, EAN13, PublisherID) VALUES (18,'nimi8',NULL,'NULL',2,'aliquip','NULL',0000000000007,2);
INSERT INTO `products` (ProductID, Name, ReleaseDate, ImagePath, LanguageID, Brief, Description, EAN13, PublisherID) VALUES (19,'nimi9',NULL,'elit',3,'ea','commodo',0000000000008,4);
INSERT INTO `products` (ProductID, Name, ReleaseDate, ImagePath, LanguageID, Brief, Description, EAN13, PublisherID) VALUES (10,'nimi10','2015-11-11','sed',1,'consequat','Duis',0000000000009,5);
INSERT INTO `products` (ProductID, Name, ReleaseDate, ImagePath, LanguageID, Brief, Description, EAN13, PublisherID) VALUES (12,'nimi11','2014-11-11','do',NULL,'aute','irure',1000000000000,NULL);
INSERT INTO `products` (ProductID, Name, ReleaseDate, ImagePath, LanguageID, Brief, Description, EAN13, PublisherID) VALUES (13,'nimi12','2013-11-11','NULL',2,'dolor','in',NULL,5);
INSERT INTO `products` (ProductID, Name, ReleaseDate, ImagePath, LanguageID, Brief, Description, EAN13, PublisherID) VALUES (14,'nimi13','2012-11-11','tempor',1,'reprehenderit','in',3000000000000,4);
INSERT INTO `products` (ProductID, Name, ReleaseDate, ImagePath, LanguageID, Brief, Description, EAN13, PublisherID) VALUES (15,'nimi14','2012-11-11','incididunt',NULL,'NULL','velit',4000000000000,3);
INSERT INTO `products` (ProductID, Name, ReleaseDate, ImagePath, LanguageID, Brief, Description, EAN13, PublisherID) VALUES (21,'nimi15',NULL,'ut',2,'NULL','cillum',5000000000000,2);
INSERT INTO `products` (ProductID, Name, ReleaseDate, ImagePath, LanguageID, Brief, Description, EAN13, PublisherID) VALUES (31,'nimi16','2010-11-11','labore',1,'dolore','eu',NULL,1);
INSERT INTO `products` (ProductID, Name, ReleaseDate, ImagePath, LanguageID, Brief, Description, EAN13, PublisherID) VALUES (41,'nimi17','2010-11-11','et',3,'fugiat','NULL',7000000000000,6);
INSERT INTO `products` (ProductID, Name, ReleaseDate, ImagePath, LanguageID, Brief, Description, EAN13, PublisherID) VALUES (51,'nimi18','2016-01-11','dolore',2,'pariatur','Excepteur',8000000000000,4);
INSERT INTO `products` (ProductID, Name, ReleaseDate, ImagePath, LanguageID, Brief, Description, EAN13, PublisherID) VALUES (61,'nimi19','2012-11-01','magna',1,'sint','occaecat',9000000000000,5);
INSERT INTO `products` (ProductID, Name, ReleaseDate, ImagePath, LanguageID, Brief, Description, EAN13, PublisherID) VALUES (71,'nimi20',NULL,'NULL',NULL,'NULL','NULL',NULL,NULL);

