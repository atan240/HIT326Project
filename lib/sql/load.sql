use newspaper_db;

INSERT INTO Users (username, user_FN, user_LN, user_email, user_role) values ("lkjh1", "Luke", "Johns", "lkjh1@gmail.com", "journalist");
INSERT INTO Users (username, user_FN, user_LN, user_email, user_role) values ("abcde2", "Alex", "Brown", "abcde2@gmail.com", "editor");
INSERT INTO Users (username, user_FN, user_LN, user_email, user_role) values ("qwerty3", "Quinn", "Williams", "qwerty3@gmail.com", "user");
INSERT INTO Users (username, user_FN, user_LN, user_email, user_role) values ("zxcvb4", "Zoe", "Carter", "zxcvb4@gmail.com", "journalist");
INSERT INTO Users (username, user_FN, user_LN, user_email, user_role) values ("asdfg5", "Anna", "Smith", "asdfg5@gmail.com", "user");

INSERT INTO Article_Content (user_ID, news_title, news_timestamp, image_url, news_body) values ("1", "Osmosis", "2023-05-25 18:43:10", "https://upload.wikimedia.org/wikipedia/commons/thumb/6/62/0307_Osmosis.jpg/400px-0307_Osmosis.jpg", "Osmosis (/ɒzˈmoʊsɪs/, US also /ɒs-/)[1] is the spontaneous net movement or diffusion of solvent molecules through a selectively-permeable membrane from a region of high water potential (region of lower solute concentration) to a region of low water potential (region of higher solute concentration),[2] in the direction that tends to equalize the solute concentrations on the two sides.[3][4][5] It may also be used to describe a physical process in which any solvent moves across a selectively permeable membrane (permeable to the solvent, but not the solute) separating two solutions of different concentrations.[6][7] Osmosis can be made to do work.[8] Osmotic pressure is defined as the external pressure required to be applied so that there is no net movement of solvent across the membrane. Osmotic pressure is a colligative property, meaning that the osmotic pressure depends on the molar concentration of the solute but not on its identity.");

INSERT INTO Article_Content (user_ID, news_title, news_timestamp, image_url, news_body) values ("2", "Python Programming", "2023-03-22 11:52:43", "https://upload.wikimedia.org/wikipedia/commons/thumb/c/c3/Python-logo-notext.svg/121px-Python-logo-notext.svg.png", "Python is a high-level, general-purpose programming language. Its design philosophy emphasizes code readability with the use of significant indentation via the off-side rule.[34]

Python is dynamically typed and garbage-collected. It supports multiple programming paradigms, including structured (particularly procedural), object-oriented and functional programming. It is often described as a 'batteries included' language due to its comprehensive standard library.[35][36]

Guido van Rossum began working on Python in the late 1980s as a successor to the ABC programming language and first released it in 1991 as Python 0.9.0.[37] Python 2.0 was released in 2000. Python 3.0, released in 2008, was a major revision not completely backward-compatible with earlier versions. Python 2.7.18, released in 2020, was the last release of Python 2.[38]

Python consistently ranks as one of the most popular programming languages.");

INSERT INTO Article_Content (user_ID, news_title, news_timestamp, image_url, news_body) values ("3", "Ruby", "2023-01-08 22:12:33", "https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Ruby_logo.svg/121px-Ruby_logo.svg.png", "Ruby is an interpreted, high-level, general-purpose programming language which supports multiple programming paradigms. It was designed with an emphasis on programming productivity and simplicity. In Ruby, everything is an object, including primitive data types. It was developed in the mid-1990s by Yukihiro 'Matz' Matsumoto in Japan.

Ruby is dynamically typed and uses garbage collection and just-in-time compilation. It supports multiple programming paradigms, including procedural, object-oriented, and functional programming. According to the creator, Ruby was influenced by Perl, Smalltalk, Eiffel, Ada, BASIC, Java and Lisp.");

INSERT INTO Article_Content (user_ID, news_title, news_timestamp, image_url, news_body) values ("4", "C++", "2022-12-16 15:13:40", "https://upload.wikimedia.org/wikipedia/commons/thumb/1/18/ISO_C%2B%2B_Logo.svg/120px-ISO_C%2B%2B_Logo.svg.png", "C++ (/ˈsiː plʌs plʌs/, pronounced 'C plus plus') is a high-level, general-purpose programming language created by Danish computer scientist Bjarne Stroustrup. First released in 1985 as an extension of the C programming language, it has since expanded significantly over time; modern C++ currently has object-oriented, generic, and functional features, in addition to facilities for low-level memory manipulation. It is almost always implemented as a compiled language, and many vendors provide C++ compilers, including the Free Software Foundation, LLVM, Microsoft, Intel, Embarcadero, Oracle, and IBM.[13]

C++ was designed with systems programming and embedded, resource-constrained software and large systems in mind, with performance, efficiency, and flexibility of use as its design highlights.[14] C++ has also been found useful in many other contexts, with key strengths being software infrastructure and resource-constrained applications,[14] including desktop applications, video games, servers (e.g. e-commerce, web search, or databases), and performance-critical applications (e.g. telephone switches or space probes).[15]");

INSERT INTO Article_Content (user_ID, news_title, news_timestamp, image_url, news_body) values ("3", "PHP", "2022-09-30 20:55:10", "https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/121px-PHP-logo.svg.png", "PHP is a general-purpose scripting language geared toward web development.[8] It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1993 and released in 1995.[9][10] The PHP reference implementation is now produced by The PHP Group.[11] PHP was originally an abbreviation of Personal Home Page,[12][13] but it now stands for the recursive initialism PHP: Hypertext Preprocessor.[14]

PHP code is usually processed on a web server by a PHP interpreter implemented as a module, a daemon or as a Common Gateway Interface (CGI) executable. On a web server, the result of the interpreted and executed PHP code – which may be any type of data, such as generated HTML or binary image data – would form the whole or part of an HTTP response. Various web template systems, web content management systems, and web frameworks exist which can be employed to orchestrate or facilitate the generation of that response. Additionally, PHP can be used for many programming tasks outside the web context, such as standalone graphical applications[15] and robotic drone control.[16] PHP code can also be directly executed from the command line.

The standard PHP interpreter, powered by the Zend Engine, is free software released under the PHP License. PHP has been widely ported and can be deployed on most web servers on a variety of operating systems and platforms.[17]");

INSERT INTO Comments (comment_ID, user_ID, article_ID, comment_body, created_at) values ("1", "1", "1", "Great article!", "2023-05-26 20:38:10");
INSERT INTO Comments (comment_ID, user_ID, article_ID, comment_body, created_at) values ("2", "1", "5", "Hello", "2023-05-26 21:46:20");
INSERT INTO Comments (comment_ID, user_ID, article_ID, comment_body, created_at) values ("3", "2", "2", "What is this?", "2023-05-26 23:14:00");
INSERT INTO Comments (comment_ID, user_ID, article_ID, comment_body, created_at) values ("4", "3", "3", "Cool", "2023-05-28 15:21:46");
INSERT INTO Comments (comment_ID, user_ID, article_ID, comment_body, created_at) values ("5", "2", "4", "I like this", "2023-05-28 15:23:57");
INSERT INTO Comments (comment_ID, user_ID, article_ID, comment_body, created_at) values ("6", "4", "1", "I disagree", "2023-05-28 15:24:14");

INSERT INTO tags (tag_ID, tag_name) values ("1", "water");
INSERT INTO tags (tag_ID, tag_name) values ("2", "osmosis");
INSERT INTO tags (tag_ID, tag_name) values ("3", "coding");
INSERT INTO tags (tag_ID, tag_name) values ("4", "python");
INSERT INTO tags (tag_ID, tag_name) values ("5", "ruby");
INSERT INTO tags (tag_ID, tag_name) values ("6", "C++");
INSERT INTO tags (tag_ID, tag_name) values ("7", "PHP");
INSERT INTO tags (tag_ID, tag_name) values ("8", "database");

INSERT INTO article_tags (tag_ID, article_ID) values ("1","1");
INSERT INTO article_tags (tag_ID, article_ID) values ("2","1");
INSERT INTO article_tags (tag_ID, article_ID) values ("3","2");
INSERT INTO article_tags (tag_ID, article_ID) values ("4","2");
INSERT INTO article_tags (tag_ID, article_ID) values ("3","3");
INSERT INTO article_tags (tag_ID, article_ID) values ("5","3");
INSERT INTO article_tags (tag_ID, article_ID) values ("3","4");
INSERT INTO article_tags (tag_ID, article_ID) values ("6","4");
INSERT INTO article_tags (tag_ID, article_ID) values ("3","5");
INSERT INTO article_tags (tag_ID, article_ID) values ("7","5");
INSERT INTO article_tags (tag_ID, article_ID) values ("8","5");