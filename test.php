<?php
require_once ('./davila-trabajando-connector.php');

$payload = '{
	"confidential": 0,
	"externalContactInfo": {
	  "companyIdNumber": "661195",
	  "companyName": "Clinica Davila",
	  "contactEmail": "davila@nsclick.cl",
	  "contactName": "Clinica Davila Contacto ",
	  "contactJobtitle": "Mr Davila",
	  "phoneNumber": "77777777",
	  "token": "342a54d0ba20ebe951857712eaf0326a",
	  "client": "CLINICADAVILA-CL",
	  "country": "CL"
	},
	"domainsClonesJobs": [
	  "int"
	],
	"companyId": 661195,
	"jobId": 0,
	"description": {
	  "typeBehavior": 0,
	  "tags": [
		"int"
	  ],
	  "jobTitle": "Oferta Prueba", 
	  "expirationDate": 30,
	  "workTime": "De 8 a 18",
	  "paymentMethod": 1,
	  "jobAreaId": 27, 
	  "companyName": "Clinica Davila",
	  "jobDescription": "Desc del trabajo",
	  "availabilityId": "",
	  "jobValidity": 60, 
	  "vacancies": 2,
	  "contractTime": "20 dias",
	  "jobTypeId": 28,
	  "salary": 3000000,
	  "showSalary": 0, 
	  "companyActivityId": 3,
	  "workDayId": 1, 
	  "salaryComment": "comentario sobre el sueldo",
	  "jobLink": ""
	}, 
	"hidden": 0,
	"jobStatus": 0,
	"token": "342a54d0ba20ebe951857712eaf0326a",
	"client": "CLINICADAVILA-CL",
	"country": "CL"
  }';

echo create_job($payload);