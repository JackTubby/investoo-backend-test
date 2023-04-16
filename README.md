Run with php artisan serve

### routes > api.php
- Define API routes

### app > Http > TodoController.php
- Handle HTTP requests related to the Todo model.
  - index 
    - Handles the GET request to retrieve all todo items. Paginate the results and returns them as a JSON response
  - store
    - Handles the POST request to create a new item. Validate the title field then creates item.
  - show
    - Handles GET request for a single item by using the id.
  - update
    - Handles PUT request to update an existing todo item. Validate the title field then creates item.
  - Destory
    - Handles DELETE request to delete a todo item by its id. It then returns a noContent response. 

### database > migrations > 2023_04_14
- Migration file that creates a database table called todos with columns for specified data.