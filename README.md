# developer-challenge-pay-dates-thusara-updated-with-composer
This repository contains the updated solution (adding composer to handle classes) for fictional company to determine the dates they need to pay salaries to their sales department.

# Prerequisites
* PHP >=7.2
* [Composer](https://getcomposer.org/)

# Installation

1. Clone the repository: `git clone https://github.com/Deem97/developer-challenge-pay-dates-thusara-updated-with-composer`
2. Navigate to the project directory: `cd developer-challenge-pay-dates-thusara-updated-with-composer`
3. If you don't have Composer installed, follow the instructions on the [Composer](https://getcomposer.org/) website to install it.
4. Install dependencies using composer: `composer install`
5. Navigate to the src directory: `cd src`
6. Run the application: `php PaymentDateProcessor.php [desired_output_file_name]`

## Note : 
* Give a out file name to desired_output_file_name as command line argument.
* If not a default file name is used to generate the file in the format "payment-date-{current_year}.csv".
* Output file will create inside the project directory (developer-challenge-pay-dates-thusara-updated-with-composer)
* Output file contains payment dates from the current month onwards (According to requiremnt: containing the payment dates for the remainder of this year). 

### Reasons to update with Composer:
* Namespacing: Composer makes it easier to manage dependencies by providing namespacing and autoloading support.
* Autoloading: Composer provides an autoloading feature, which means that no longer need to manually include or require each file. This can greatly simplify your code and improve performance.
