# Notes Module for Infix EMS

The Notes Module is a comprehensive note management system that allows users to create, manage, and organize different types of notes including expenses, incomes, events, incidents, and general notes.

## Features

- ✅ Create and manage various types of notes
- ✅ CRUD operations (Create, Read, Update, Delete)
- ✅ Advanced filtering and search
- ✅ Export to Excel and PDF
- ✅ Role-based permissions
- ✅ Responsive design
- ✅ Integration with existing EMS system

## Installation

### Automated Installation (Recommended)

Run the deployment script on your production server:

```bash
cd Modules/Notes
chmod +x deploy.sh
./deploy.sh
```

### Manual Installation

1. **Run Composer Autoload**

   ```bash
   composer dump-autoload
   ```

2. **Run Database Migrations**

   ```bash
   php artisan migrate
   ```

3. **Seed Permissions (Optional)**

   ```bash
   php artisan module:seed Notes
   ```

4. **Clear Cache**

   ```bash
   php artisan cache:clear
   php artisan config:clear
   php artisan view:clear
   php artisan route:clear
   ```

5. **Optimize for Production**
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

## Module Structure

```
Modules/Notes/
├── Config/
│   └── config.php
├── Database/
│   ├── Migrations/
│   │   └── 2025_07_30_000000_create_notes_table.php
│   └── Seeders/
│       ├── NotesDatabaseSeeder.php
│       └── NotesPermissionSeeder.php
├── Entities/
│   └── Note.php
├── Http/
│   ├── Controllers/
│   │   └── NoteController.php
│   └── Requests/
│       └── NoteRequest.php
├── Providers/
│   ├── NotesServiceProvider.php
│   └── RouteServiceProvider.php
├── Resources/
│   └── views/
│       ├── create.blade.php
│       ├── edit.blade.php
│       ├── index.blade.php
│       └── show.blade.php
├── Routes/
│   ├── api.php
│   └── web.php
├── composer.json
├── module.json
├── package.json
└── webpack.mix.js
```

## Permissions

The module includes the following permissions:

- `notes_view` - View notes
- `notes_add` - Create new notes
- `notes_edit` - Edit existing notes
- `notes_delete` - Delete notes
- `notes_export` - Export notes to Excel/PDF

## API Endpoints

### Web Routes

- `GET /notes` - List all notes
- `GET /notes/create` - Show create form
- `POST /notes` - Store new note
- `GET /notes/{id}` - Show specific note
- `GET /notes/{id}/edit` - Show edit form
- `PUT /notes/{id}` - Update note
- `DELETE /notes/{id}` - Delete note
- `GET /notes/export/excel` - Export to Excel
- `GET /notes/export/pdf` - Export to PDF

## Database Schema

The `notes` table includes:

- `id` - Primary key
- `title` - Note title
- `content` - Note content (text)
- `type` - Note type (expense, income, event, incident, general)
- `reference_id` - Optional reference to other entities
- `tags` - Optional tags for categorization
- `quantity` - Optional quantity field
- `amount` - Optional amount field
- `created_by` - User who created the note
- `timestamps` - Created at / Updated at

## Usage

### Accessing the Module

Once installed, the Notes module will be available at `/notes` in your application.

### Creating Notes

1. Navigate to `/notes`
2. Click "Create New Note"
3. Fill in the required fields
4. Select the appropriate note type
5. Save the note

### Exporting Data

- **Excel Export**: Click the Excel export button on the notes list page
- **PDF Export**: Click the PDF export button on the notes list page

## Configuration

The module configuration can be found in `Config/config.php`. You can publish and modify this configuration as needed.

## Troubleshooting

### Module Not Showing

1. Ensure the module is enabled in `modules_statuses.json`
2. Clear all caches: `php artisan cache:clear`
3. Check that permissions are properly seeded

### Permission Errors

1. Run the permission seeder: `php artisan module:seed Notes`
2. Assign appropriate permissions to user roles

### Database Issues

1. Ensure migrations have been run: `php artisan migrate`
2. Check database connection

## Support

For issues or questions about the Notes module, please check:

1. The implementation plan: `NOTES_MODULE_IMPLEMENTATION_PLAN.md`
2. Laravel module documentation
3. Infix EMS documentation

## Version

Current version: 1.0.0

## License

This module is part of the Infix EMS system and follows the same licensing terms.
