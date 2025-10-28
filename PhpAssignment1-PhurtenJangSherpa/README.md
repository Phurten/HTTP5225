
# Toronto Tennis Court Finder

 A comprehensive web application for finding tennis courts in Toronto, built with PHP, MySQL, and modern web technologies. The application displays tennis courts from the Toronto Open Data tennis dataset with search functionality, Google Maps integration, and a responsive design.

  

## Features

  

### Core Functionality

-  **Tennis Court Database**: Complete database of Toronto tennis courts with detailed information

-  **Real-time Search**: Search courts by park name or location with instant results

-  **Google Maps Integration**: Click-to-open Google Maps with precise GPS coordinates

  
## Tech Stack

  

-  **Backend**: PHP

-  **Database**: MySQL/MariaDB

-  **Frontend**: HTML5, CSS3, JavaScript (ES6+)

-  **Styling**: Bootstrap 5, Custom CSS with CSS Variables

-  **APIs**: Google Maps API integration

-  **Data Source**: Toronto Open Data tennis courts dataset

  
  

### Google Maps Integration

```php

// Extract GPS coordinates from JSON geometry

$coordinates = json_decode($row['geometry'], true);

if (isset($coordinates['coordinates'])) {

$lng = $coordinates['coordinates'][0];

$lat = $coordinates['coordinates'][1];

$maps_url = "https://www.google.com/maps?q={$lat},{$lng}";

}

```

  

## Data Source

  

This application uses data from:

-  **Toronto Open Data**: Tennis Courts dataset

-  **Dataset**: Contains information about public tennis courts in Toronto

-  **License**: Open Government License - Toronto

-  **URL**: [Toronto Open Data Portal](https://open.toronto.ca/)


## Future Enhancements

  

-  **Advanced Filtering**: Filter by court surface, lighting, etc.

-  **User Reviews**: Add rating and review system

-  **Booking Integration**: Connect with court booking systems

-  **Weather API**: Show current weather conditions

-  **Favorites**: Save favorite courts to local storage

-  **Directions**: Integrated turn-by-turn directions

  



## Acknowledgments

  

-  **Toronto Open Data**: For providing the tennis courts dataset

-  **Unsplash**: For the hero background image

-  **Bootstrap**: For the responsive grid system

-  **Google Maps**: For the mapping integration

  
## Author

  

**Phurten Jang Sherpa**

Web Development Project - HTTP5225