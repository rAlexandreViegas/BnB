# BnB platform

## Entities

### Review

This entity represents a review made by a traveler to a booking for a room.

| Property   | Type      | Description          | Relationship |
| ---------- | --------- | -------------------- | ------------ |
| title      | string    | 50 NOT NULL          |              |
| comment    | text      | NOT NULL             |              |
| rating     | integer   | NOT NULL             |              |
| created_at | datetime  | NOT NULL             |              |
| traveler   | ManyToOne | NOT NULL, OrphanTrue | User         |
| rooms      | ManyToOne | NOT NULL, OrphanTrue | Room         |
| booking    | OneToOne  | NOT NULL, OrphanTrue | Booking      |

### Booking

This entity represents a booking made by a traveler to a room.

| Property   | Type      | Description          | Relationship |
| ---------- | --------- | -------------------- | ------------ |
| number     | string    | 50 NOT NULL          |              |
| check_in   | datetime  | NOT NULL             |              |
| check_out  | datetime  | NOT NULL             |              |
| occupants  | integer   | NOT NULL             |              |
| created_at | datetime  | NOT NULL             |              |
| traveler   | ManyToOne | NOT NULL, OrphanTrue | User         |
| room       | ManyToOne | OrphanTrue           | Room         |
| review     | OneToOne  | OrphanTrue           | Review       |

### Equipment

This entity represents the equipments for a room.

| Property | Type       | Description | Relationship |
| -------- | ---------- | ----------- | ------------ |
| name     | string     | 50 NOT NULL |              |
| rooms    | ManyToMany |             | Room         |
