ALTER TABLE
    modules AUTO_INCREMENT = 1;

-- for get list of subpropertytypes
SELECT
    subpropertytypes.*,
    property_category.cat_title
FROM
    `subpropertytypes`
    LEFT JOIN property_category on subpropertytypes.cat_id = property_category.cat_id
WHERE
    subpropertytypes.status = 1;

/ / echo $ builder -> getCompiledSelect();

/ / die;

-- for property location
SELECT
    property_location_details.id,
    property_location_details.city,
    propertycities.ct_title,
    property_location_details.appartment,
    apartments.ap_title,
    property_location_details.house_number,
    property_location_details.project,
    projects.project_title,
    property_location_details.locality,
    localities.locality_title,
    property_location_details.sub_locality,
    sublocalities.sublocality_title,
    property_location_details.address,
    property_location_details.located_inside,
    locatedinsides.title as located_inside_title,
    property_location_details.zone,
    zonetypes.title as zone_title,
    property_location_details.property_id,
    property_location_details.status
FROM
    property_location_details
    LEFT JOIN propertycities ON propertycities.id = property_location_details.city
    LEFT JOIN apartments on apartments.id = property_location_details.appartment
    LEFT JOIN projects on projects.id = property_location_details.project
    LEFT JOIN localities on localities.id = property_location_details.locality
    LEFT JOIN sublocalities on sublocalities.id = property_location_details.sub_locality
    LEFT JOIN locatedinsides on locatedinsides.id = property_location_details.located_inside
    LEFT JOIN zonetypes on zonetypes.id = property_location_details.zone
WHERE
    property_location_details.property_id = 17;

-- // echo   $builder->getCompiledSelect();
