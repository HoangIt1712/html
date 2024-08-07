--1,2:
CREATE TABLE Department (
    DeptId INT PRIMARY KEY,
    DepartName VARCHAR(50) NOT NULL,
    Description VARCHAR(100) NOT NULL
);
CREATE TABLE Employee (
    EmpCode CHAR(6) PRIMARY KEY, 
    FirstName VARCHAR(30) NOT NULL,
    LastName VARCHAR(30) NOT NULL,
    BirthDay SMALLDATETIME NOT NULL,
    Gender BIT DEFAULT 1,
    DeptID INT,
    Address VARCHAR(100),
    Salary MONEY
);

ALTER TABLE Employee
ADD CONSTRAINT FK_DeptID FOREIGN KEY (DeptID) REFERENCES Department(DeptId);
--3:
INSERT INTO Employee (EmpCode, FirstName, LastName, BirthDay, Gender, DeptID, Address, Salary) VALUES 
('A001', 'Hoang', 'Nguyen', '2003-08-20', 0, 101, 'Bla Bla', 90000),
('A002', 'Ha', 'Nguyen', '2004-11-10', 1, 102, 'Bla Bla', 80000),
('A002', 'Huyen', 'Nguyen', '2000-12-10', 1, 103, 'Bla Bla', 80000);

INSERT INTO Department (DeptId, DepartName, Description) VALUES
('X123', 'Hoang', 'bla bla'),
('X124', 'Ha', 'bla bla'),
('X125', 'Huyen', 'bla bla');

--4:
UPDATE Employee SET Salary = Salary * 1.10;

--5:
ALTER TABLE Employee
ADD CONSTRAINT ck_Salary CHECK (Salary > 0);
