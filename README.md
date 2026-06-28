## REST API Documentation
This project supports a REST API secured with Laravel Sanctum. 
You can test this API by importing the `arctic-travels-api.json` file into Postman.

### Available Endpoints:
- `POST /api/register` - Customer Account Registration
- `POST /api/login` - Login & Get Bearer Token
- `GET /api/resorts` - Retrieve All Resort Data (Public)
- `GET /api/my-bookings` - Retrieve Booking History (Protected)
