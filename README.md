# **Notes Application - Built with Laravel**

Welcome to the Notes Application! This simple yet powerful app allows users to create, update, delete, and manage their personal notes. Built with **Laravel**, it focuses on security, scalability, and seamless user experience. Below you'll find the details on how to set up and use this application.

---

## **Features**

- **User Authentication**: Secure login and registration using Laravel's built-in authentication system.
- **CRUD Operations**: Users can Create, Read, Update, and Delete their notes.
- **UUID for Notes**: Each note has a unique identifier (UUID) for better management.
- **Authorization**: Notes are associated with a user, ensuring each user can only view or modify their own notes.
- **Pagination**: Notes are displayed in a paginated format for better user experience.
- **Trashed Notes**: Deleted notes are moved to a trash section and can be restored or permanently deleted.

---

## **Setup Instructions**

### **Prerequisites**

- PHP >= 8.1
- Composer
- Laravel 9.x or higher
- MySQL or any compatible database

### **Installation**

1. Clone the repository:
   ```bash
   git clone https://github.com/yourusername/notes-app.git
   cd notes-app
   ```

2. Install dependencies:
   ```bash
   composer install
   ```

3. Set up the `.env` file:
   Copy `.env.example` to `.env`:
   ```bash
   cp .env.example .env
   ```

4. Generate the application key:
   ```bash
   php artisan key:generate
   ```

5. Set up the database:
   Update the `.env` file with your database credentials:
   ```bash
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=notes_app
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. Run the migrations:
   ```bash
   php artisan migrate
   ```

7. Start the development server:
   ```bash
   php artisan serve
   ```

Your application should now be accessible at `http://localhost:8000`.

---

## **Usage**

### **Endpoints**

- **GET /notes**: Display all notes for the authenticated user.
- **GET /notes/create**: Show the form to create a new note.
- **POST /notes**: Store a newly created note.
- **GET /notes/{uuid}**: Show a single note by UUID.
- **GET /notes/{uuid}/edit**: Show the form to edit a specific note.
- **PUT /notes/{uuid}**: Update a specific note.
- **DELETE /notes/{uuid}**: Delete a specific note.
- **GET /trashed**: Show all trashed notes for the authenticated user.
- **PUT /trashed/{uuid}**: Restore a trashed note.
- **DELETE /trashed/{uuid}**: Permanently delete a trashed note.

### **User Roles and Permissions**

- **Authenticated Users**: Can create, update, delete, and view their own notes.
- **Unauthorized Access**: Users cannot access or modify notes that belong to others. Unauthorized users will receive a **403 Forbidden** response.

---

## **Code Explanation**

### **NoteController**
- **Index**: Retrieves and displays a list of the authenticated user's notes, paginated.
- **Create**: Returns the view for creating a new note.
- **Store**: Validates and stores a new note in the database.
- **Show**: Displays a specific note. Ensures that only the owner of the note can view it.
- **Edit**: Returns the view to edit an existing note, if the authenticated user is the owner.
- **Update**: Validates and updates an existing note.
- **Destroy**: Deletes a note if the authenticated user is the owner.

### **TrashedNoteController**
- **Index**: Displays a list of all trashed notes for the authenticated user, paginated.
- **Show**: Displays a trashed note. Ensures that only the owner of the note can view it.
- **Update**: Restores a trashed note if the authenticated user is the owner.
- **Destroy**: Permanently deletes a trashed note.

### **Authorization**:  
Each action checks if the note belongs to the authenticated user, ensuring that users cannot access or modify notes belonging to others.

### **UUID**:  
Each note is assigned a unique identifier using `Str::uuid()`, making it easier to manage notes securely.

### **Soft Deletion**:  
Deleted notes are not immediately removed from the database. Instead, they are "soft deleted" (marked as trashed) and can be restored or permanently deleted later.

---

## **Contributing**

If you'd like to contribute to the project, feel free to fork the repository and submit a pull request. Please ensure that your code adheres to the project's coding standards and includes appropriate tests.

---

## **License**

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

## **Contact**

For any questions or feedback, feel free to reach out to me at [dev.vivek.lode@gmail.com].
