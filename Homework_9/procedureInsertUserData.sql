CREATE Procedure [dbo].[InsertUserData]
@firstName varchar(50),
@lastName varchar(50),
@emailAddress varchar(100), 
@phone varchar(50),
@username varchar(50), 
@PWD varbinary(50), 
@gamertag varchar(50)

AS 

BEGIN

INSERT INTO players (firstName, lastName, emailAddress, phone, username, PWD, gamertag) 
VALUES (@firstName, @lastName, @emailAddress, @phone, @username, @PWD, @gamertag)

END