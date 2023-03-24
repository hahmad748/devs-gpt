<p align="center"><img src="/art/header.png?1" alt="devsfort logo"></p>

# ChatGPT Laravel Package
ChatGPT is a Laravel package that provides integration with the ChatGPT API, a powerful AI-powered chatbot platform that can understand natural language queries and provide relevant responses. This package allows you to easily integrate ChatGPT into your Laravel application, enabling you to create intelligent chatbots that can help automate customer service, support, and other tasks.

## Features
- Provides a simple API for querying the ChatGPT API and receiving chatbot responses.
- Supports integration with Laravel's built-in caching system for improved performance.
- Provides an easy-to-use interface for configuring your ChatGPT API key and other settings.


## Installation
To install the ChatGPT package, follow these simple steps:


```sh
composer require devsfort/chat-gpt
php artisan vendor:publish --tag=chatgpt-config
php artisan migrate

```
## Configuration
CHATGPT_API_KEY=your-api-key-here

You can also modify the package's configuration file directly, located at config/chat-gpt.php, to adjust other settings.

## Usage
To use the ChatGPT package, simply create a new instance of the ChatGPT manager and call its getResults() method to send a query to the ChatGPT API and receive a response:
- getResults() require Request object with message as a parameter to be used for chatgpt.
### OR 
- send a POST request to ``` /api/v1/get-response ``` with data param as ``` message ```







## Credits

- [Haseeb Ahmad](https://github.com/hahmad748)



## License

Devsfort ChatGpt is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
