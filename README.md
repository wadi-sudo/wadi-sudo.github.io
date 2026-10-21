# Earth Lab Tunisia — Urban Heat & Growth

Earth Lab Tunisia is a browser-based geospatial application for exploring land-surface temperature, vegetation, built-up areas, and urban expansion in Tunisia. It uses Leaflet for the interactive map and Google Earth Engine for satellite-data processing.

## Features

- **Interactive map:** Switch between satellite imagery, OpenStreetMap, and topographic basemaps.
- **Locations:** Jump to eight predefined Tunisian cities: Tunis, Sfax, Sousse, Bizerte, Gabès, Kairouan, Nabeul, and Tozeur.
- **Map layers:**
  - Land-surface temperature (°C)
  - Normalized Difference Vegetation Index (NDVI)
  - Built-up area
  - New built-up area relative to 2016
- **Time controls:** Select a year from 2014 to 2025 and choose a season or the whole year.
- **Display controls:** Adjust overlay opacity and select a 1 km, 3 km, or 5 km analysis radius.
- **Point-based analysis:** Click the map to calculate temperature and vegetation trends around the selected location, and estimate built-up area for 2016 and the selected year.
- **Trend charts and indicators:** Display annual temperature and NDVI series, estimated trends per decade, built-up area, and percentage change.
- **NASA preview:** View a NASA MODIS land-surface-temperature layer without signing in to Earth Engine.
- **Connection diagnostics:** View startup logs and basic configuration guidance.

## Data and methods

- **Land-surface temperature and NDVI:** Landsat 8 and Landsat 9 Collection 2, Tier 1, Level 2 imagery. The app masks pixels using `QA_PIXEL` and builds seasonal or annual median composites.
- **Built-up areas:** Google Dynamic World (`GOOGLE/DYNAMICWORLD/V1`), using the most frequent annual label and class `6` as built area.
- **Urban growth:** Pixels classified as built-up in the selected year but not in 2016.
- **Analysis area:** A circular buffer around the clicked location, using the selected radius.
- **Trend period:** Annual temperature and NDVI values are requested for 2014–2025. Built-up area is compared between 2016 and the selected year.

The results depend on satellite-data availability, cloud masking, and the spatial scale used by Earth Engine. They are remote-sensing estimates, not ground measurements.

## Requirements

- A modern browser and internet connection.
- A Google Earth Engine-enabled Google Cloud project.
- An OAuth 2.0 **Web application** client ID, configured with the site's authorized JavaScript origin.
- The Earth Engine API enabled for the project and Earth Engine access registered for it.

## Configuration

In `index.html`, edit the `window.GEE_INLINE` block near the top:

```js
window.GEE_INLINE = {
  clientId: "YOUR_OAUTH_CLIENT_ID.apps.googleusercontent.com",
  project: "YOUR_EARTH_ENGINE_PROJECT_ID",
  tokenEndpoint: "",
  eeLib: ""
};
```

- `clientId`: OAuth client ID for the web application.
- `project`: Google Cloud project ID registered for Earth Engine.
- `tokenEndpoint`: Optional endpoint used by the app to retrieve an access token. Leave empty to use the built-in Google OAuth sign-in flow.
- `eeLib`: Optional custom URL for the Earth Engine JavaScript library. Leave empty to use the configured CDN fallbacks.

Follow the Google Cloud and Earth Engine setup instructions shown in the app's connection dialog. Add the exact website origin (for example, `https://YOURNAME.github.io`) to the OAuth client's **Authorized JavaScript origins**.

## Run and deploy

This is a single-page HTML application. To run it locally, serve `index.html` from a local web server and authorize that origin in the OAuth client. To publish it, place `index.html` in a GitHub repository and enable GitHub Pages, then add the published origin to the OAuth configuration.

The app loads Leaflet, the Earth Engine JavaScript client, map tiles, and fonts from external services, so an internet connection is required.

## Limitations

- The analysis covers the configured Tunisia rectangle; it is not a global analysis tool.
- The built-up comparison uses 2016 as its baseline.
- The NASA preview is a separate MODIS temperature layer; it does not provide the full Earth Engine analysis.
- The optional token-endpoint mode depends on a compatible endpoint that returns an access token. The endpoint is not implemented in this HTML file.
- This is a client-side application; the provided code does not include a separate application backend or database.
