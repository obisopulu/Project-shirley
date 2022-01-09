<?php

mysqli_query($cxn, "Create database $dbname");

mysqli_select_db($cxn, $dbname);

mysqli_query ($cxn, "CREATE TABLE anonymouser (
  anonymousID int(11) NOT NULL AUTO_INCREMENT,
  anonymousIP varchar(40) DEFAULT NULL,
  anonymousPage varchar(200) DEFAULT NULL,
  anonymousPlatform varchar(100) NOT NULL,
  anonymousDevice varchar(200) DEFAULT NULL,
  anonymousTime int(4) NOT NULL,
  dateUpdated varchar(10) DEFAULT NULL 
  PRIMARY KEY  (sellerID)
)") or die('error batching parser with code [0808 65:9800.0098]1');

mysqli_query ($cxn, "CREATE TABLE feedbacker (
  feedbackID int(11) NOT NULL AUTO_INCREMENT,
  feedbackName varchar(100) DEFAULT NULL,
  feedbackEmail varchar(100) DEFAULT NULL,
  feedbackTopic varchar(200) NOT NULL,
  feedbackMessage varchar(500) NOT NULL,
  dateUpdated varchar(10) DEFAULT NULL
  PRIMARY KEY  (sellerID)
)") or die('error batching parser with code [0808 65:9800.0098]2');

mysqli_query ($cxn, "CREATE TABLE impressioner (
  impressionID int(11) NOT NULL AUTO_INCREMENT,
  impressionUser int(100) NOT NULL,
  impressionCount int(100) NOT NULL,
  dateUpdated varchar(10) NOT NULL
  PRIMARY KEY  (sellerID)
)") or die('error batching parser with code [0808 65:9800.0098]3');


mysqli_query ($cxn, "CREATE TABLE knowledgebaser (
  knowledgebaseID int(11) NOT NULL AUTO_INCREMENT,
  knowledgebaseTopic varchar(200) DEFAULT NULL,
  knowledgebaseBody varchar(2000) DEFAULT NULL,
  knowledgebaseSource varchar(100) DEFAULT NULL,
  knowledgebaseSourceLink varchar(300) DEFAULT NULL,
  knowledgebasePicture varchar(200) DEFAULT NULL,
  dateUpdated varchar(10) DEFAULT NULL
  PRIMARY KEY  (sellerID)
)") or die('error batching parser with code [0808 65:9800.0098]4');


mysqli_query ($cxn, "CREATE TABLE poster (
  postID int(11) NOT NULL AUTO_INCREMENT,
  postCategory varchar(20) DEFAULT NULL,
  postSubCategory varchar(20) DEFAULT NULL,
  postState varchar(20) DEFAULT NULL,
  postLGA varchar(20) DEFAULT NULL,
  postTitle varchar(40) DEFAULT NULL,
  postDescription varchar(500) DEFAULT NULL,
  postAmount varchar(10) DEFAULT NULL,
  postNegotiable int(1) DEFAULT NULL,
  postPic1 varchar(300) DEFAULT NULL,
  postPic2 varchar(300) DEFAULT NULL,
  postPic3 varchar(300) DEFAULT NULL,
  postImpression int(10) DEFAULT NULL,
  postReaction int(10) DEFAULT NULL,
  postRequestContactDetails int(10) DEFAULT NULL,
  postUser varchar(100) NOT NULL,
  postStatus varchar(50) NOT NULL,
  dateUpdated varchar(10) NOT NULL
  PRIMARY KEY  (sellerID)
)") or die('error batching parser with code [0808 65:9800.0098]5');

mysqli_query ($cxn, "CREATE TABLE rater (
  ratingID int(11) NOT NULL AUTO_INCREMENT,
  ratingUser varchar(40) DEFAULT NULL,
  ratingIP varchar(20) NOT NULL,
  ratingPost varchar(100) DEFAULT NULL,
  ratingAmount int(1) NOT NULL,
  dateUpdated varchar(10) DEFAULT NULL
  PRIMARY KEY  (sellerID)
)") or die('error batching parser with code [0808 65:9800.0098]6');

mysqli_query ($cxn, "CREATE TABLE seller (
  sellerID int(11) NOT NULL AUTO_INCREMENT,
  sellerName varchar(100) DEFAULT NULL,
  sellerEmail varchar(50) DEFAULT NULL,
  sellerPhone varchar(100) DEFAULT NULL,
  sellerPassword varchar(1000) DEFAULT NULL,
  sellerCode varchar(20) NOT NULL,
  sellerMailingList int(1) NOT NULL,
  dateUpdated varchar(10) NOT NULLPRIMARY KEY  (sellerID)
)") or die('error batching parser with code [0808 65:9800.0098]7');