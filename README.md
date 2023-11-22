# Project Name: JSON Data Integration and Display

This Laravel 10 project utilizes Jobs to merge JSON data from two different sources and stores this data into a MySQL database. The merged dataset is displayed in an HTML table.

## Task Description
Merge JSON data from two endpoints:
- Endpoint #1: [https://submitter.tech/test-task/endpoint1.json](https://submitter.tech/test-task/endpoint1.json) (identifier: 'name')
- Endpoint #2: [https://submitter.tech/test-task/endpoint2.json](https://submitter.tech/test-task/endpoint2.json) (identifier: 'ad_id')

The task involves associating data using 'name' from endpoint1 and 'ad_id' from endpoint2. Only specific keys are to be stored in the database:
- ad_id
- impressions
- clicks
- unique_clicks
- leads
- conversion
- roi (%)

Display the database content in an HTML table.

## Requirements

### Backend:
- PHP for server-side development.
- MySQL database for data storage.
- Data in the table should be sorted by the 'impressions' key.
- Use of REST API.
- Exception handling and error management on the server.

### Frontend:
- Use HTML, CSS, and JavaScript (or a preferred framework) for the client-side.
- Develop an interface to display data from the database in a table format.
- Implement search functionality by 'ad_id' within the table.

## Usage
To utilize this project, follow these steps:

1. Clone the repository: `git clone https://github.com/ange120/testJsonApi.git`
2. Set up the database configuration in `.env` file.
3. Install dependencies: `composer install`
4. Run the server: `php artisan serve`
5. Access the application in your browser: `http://localhost:8000`

## Notes
- Ensure the database connection is established and the required tables are created before using the application.
- Modify the necessary environment variables in the `.env` file.

### Testing
- Comprehensive tests have been added to ensure the functionality of data merging, database storage, and HTML table display. These tests cover various scenarios to validate the correctness of the implemented features.

### Jobs Configuration
- Jobs have been configured to efficiently handle the merging and storage of JSON data from different sources. This ensures seamless processing and storage of the retrieved information into the MySQL database.

## License
This project is licensed under the [MIT License](LICENSE).
