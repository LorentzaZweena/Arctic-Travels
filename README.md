# Arctic Travels - Resort Booking Platform & REST API

Arctic Travels is a winter-themed luxury resort booking and management web application. Built using a **Monolithic architecture (Laravel Blade)** for internal management, it also provides a secure **REST API protected by Laravel Sanctum** that is ready to be integrated with modern frontend frameworks (React/Next.js) or Mobile applications (Android/iOS).

## Key Features

### Customer Side (Web & API)
- Landing Page & Catalog: Displays a list of luxury resorts along with detailed amenities and pricing.
- Secure Booking System: Allows users to reserve a resort with automated duration and total price calculations (*safe-calculation*) handled entirely on the backend.
- My Bookings Page: Displays personal booking history along with the real-time status of each reservation (*Pending, Approved, Cancelled*).

### Admin Side (Web Dashboard)
- Resource Management (CRUD): Allows administrators to dynamically manage destination and resort data.
- Booking Guard & Approval: A dedicated panel to approve or cancel customer reservations.
- Role-Based Redirect: An automatic authentication system that routes users to their respective dashboards (Admin/Customer) immediately upon login.

### REST API Engine (Postman Ready)
- Authentication: Public endpoints for `Register` and `Login` that generate a secure *Bearer Token*.
- Sanctum Protection: A secured booking history endpoint (`/api/my-bookings`) that can only be accessed using a valid token.

## Tech Stack
- Backend Framework: Laravel 12 / 13
- Frontend Engine: Laravel Blade & Bootstrap 5
- Database: Sqlite
- API Authentication: Laravel Sanctum
- API Testing Tools: Postman Desktop

## How to Run the Project Locally
### Prerequisites
- PHP >= 8.4 (Laragon recommended)
- Composer
- Node.js & NPM

### Installation Steps

1. **Clone the Repository**
   ```bash
   git clone https://github.com/LorentzaZweena/Arctic-Travels.git
   cd Arctic-Travels

2. **Install PHP & JavaScript Dependencies**
```bash
composer install
npm install && npm run dev
```

3. **Configure the Environment Environment**
Copy the `.env.example` file to create a `.env` file:
```bash
cp .env.example .env

```

Open the `.env` file and adjust your database configuration:
```text
DB_CONNECTION=Sqlite
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=arctic_travels
DB_USERNAME=root
DB_PASSWORD=
```

4. **Generate the Application Key**
```bash
php artisan key:generate
```


5. **Run Database Migrations & Seeding**
Execute this command to create the tables along with sample data (User, Admin, Resort):
```bash
php artisan migrate --seed
```


6. **Start the Local Development Server**
```bash
php artisan serve
```


The application can now be accessed at: `http://127.0.0.1:8000`

---

## REST API Documentation

This project comes with a pre-configured Postman collection. You can test the API endpoints immediately by importing the `arctic-travels-api.json` file (located in the root folder of this project) into your **Postman Desktop** application.

### Available Endpoints:

| HTTP Method | Endpoint | Description | Token Protected? |
| --- | --- | --- | --- |
| **POST** | `/api/register` | Registers a new customer account | No |
| **POST** | `/api/login` | Authenticates a user & returns an `access_token` | No |
| **GET** | `/api/resorts` | Fetches the entire resort catalog data | No |
| **GET** | `/api/my-bookings` | Retrieves the booking history of the authenticated user | **Yes (Bearer Token)** |

*Note: Make sure to include the `Accept: application/json` header on every request in Postman.*

## 👥 Contributions
This project was developed independently as part of a personal portfolio for Full-Stack / Backend Web Development.
