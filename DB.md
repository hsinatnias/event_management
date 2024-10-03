Here’s the restructured version of the **event table schema and relationships** content that you can easily copy into a document editor and export as a PDF:

---

# Event Management System Database Design

### 1. **Events Table**
This table stores the basic information about each event.

| Column Name  | Data Type     | Description                                   |
|--------------|---------------|-----------------------------------------------|
| `event_id`   | INT (PK, AI)  | Primary key, unique identifier for the event. |
| `event_name` | VARCHAR(255)  | Name of the event.                            |
| `description`| TEXT          | Detailed description of the event.            |
| `start_date` | DATETIME      | When the event starts.                        |
| `end_date`   | DATETIME      | When the event ends.                          |
| `location_id`| INT (FK)      | Foreign key referencing the location.         |
| `created_by` | INT (FK)      | Foreign key referencing the user.             |
| `status`     | ENUM ('draft', 'active', 'completed') | Status of the event.  |
| `created_at` | DATETIME      | When the event was created.                   |
| `updated_at` | DATETIME      | When the event was last updated.              |

---

### 2. **Event Participants Table**
This table links participants (users) to events.

| Column Name       | Data Type          | Description                                |
|-------------------|--------------------|--------------------------------------------|
| `participant_id`   | INT (PK, AI)       | Primary key.                               |
| `event_id`         | INT (FK)           | Foreign key referencing `events.event_id`. |
| `user_id`          | INT (FK)           | Foreign key referencing the user.          |
| `status`           | ENUM ('invited', 'confirmed', 'attended', 'canceled') | Participant status. |

---

### 3. **Locations Table**
This table stores event location data.

| Column Name   | Data Type      | Description                             |
|---------------|----------------|-----------------------------------------|
| `location_id` | INT (PK, AI)   | Primary key, unique identifier.         |
| `name`        | VARCHAR(255)   | Name of the location.                   |
| `address`     | VARCHAR(255)   | Address of the location.                |
| `city`        | VARCHAR(100)   | City of the location.                   |
| `state`       | VARCHAR(100)   | State or province.                      |
| `country`     | VARCHAR(100)   | Country of the location.                |

---

### 4. **Event Schedules Table**
For events with multiple sessions, this table tracks the schedule.

| Column Name    | Data Type    | Description                               |
|----------------|--------------|-------------------------------------------|
| `schedule_id`  | INT (PK, AI) | Primary key.                              |
| `event_id`     | INT (FK)     | Foreign key referencing `events.event_id`.|
| `session_name` | VARCHAR(255) | Session name or description.              |
| `start_time`   | DATETIME     | Session start time.                       |
| `end_time`     | DATETIME     | Session end time.                         |

---

### 5. **Event Speakers Table** (Optional)
This table links speakers or guests with events.

| Column Name     | Data Type     | Description                           |
|-----------------|---------------|---------------------------------------|
| `speaker_id`    | INT (PK, AI)  | Primary key.                          |
| `event_id`      | INT (FK)      | Foreign key referencing `events.event_id`. |
| `speaker_name`  | VARCHAR(255)  | Name of the speaker.                  |
| `bio`           | TEXT          | Speaker biography.                    |

---

### Relationships
- **`events` → `event_participants`**: One-to-Many (an event can have many participants).
- **`events` → `event_schedules`**: One-to-Many (an event can have multiple schedules).
- **`events` → `locations`**: One-to-One (an event is held at one location).
- **`users` → `event_participants`**: One-to-Many (a user can participate in many events).

---

Once you copy this content into a document editor (like Word or Google Docs), you can easily export it as a **PDF**.

Let me know if you need further help!