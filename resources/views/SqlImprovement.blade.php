<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Toast -->
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #000000;
                font-family: 'Arial', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                /*display: flex;*/
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 28px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>

    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <a href="/">Back to home</a>
                <div class="title m-b-md">
                    B) SQL Improvement Logic Test
                </div>

                <hr>

                <div>
                    <p><b>Explaination:</b></p>
                    <p>It is hard to work on this as no use case was given nor sample database. So, best effort only. Remove Redundant Left Joins
Redundant LEFT JOINs (e.g. `personalities`) were detected in the query. Removing them will result in a performance improvement.</p>
                </div>
                <hr>
                <div>
                    <p><b>Improved SQL:</b></p>
                     
                    SELECT
        Jobs.id AS `Jobs__id`,
        Jobs.name AS `Jobs__name`,
        Jobs.media_id AS `Jobs__media_id`,
        Jobs.job_category_id AS `Jobs__job_category_id`,
        Jobs.job_type_id AS `Jobs__job_type_id`,
        Jobs.description AS `Jobs__description`,
        Jobs.detail AS `Jobs__detail`,
        Jobs.business_skill AS `Jobs__business_skill`,
        Jobs.knowledge AS `Jobs__knowledge`,
        Jobs.location AS `Jobs__location`,
        Jobs.activity AS `Jobs__activity`,
        Jobs.academic_degree_doctor AS `Jobs__academic_degree_doctor`,
        Jobs.academic_degree_master AS `Jobs__academic_degree_master`,
        Jobs.academic_degree_professional AS `Jobs__academic_degree_professional`,
        Jobs.academic_degree_bachelor AS `Jobs__academic_degree_bachelor`,
        Jobs.salary_statistic_group AS `Jobs__salary_statistic_group`,
        Jobs.salary_range_first_year AS `Jobs__salary_range_first_year`,
        Jobs.salary_range_average AS `Jobs__salary_range_average`,
        Jobs.salary_range_remarks AS `Jobs__salary_range_remarks`,
        Jobs.restriction AS `Jobs__restriction`,
        Jobs.estimated_total_workers AS `Jobs__estimated_total_workers`,
        Jobs.remarks AS `Jobs__remarks`,
        Jobs.url AS `Jobs__url`,
        Jobs.seo_description AS `Jobs__seo_description`,
        Jobs.seo_keywords AS `Jobs__seo_keywords`,
        Jobs.sort_order AS `Jobs__sort_order`,
        Jobs.publish_status AS `Jobs__publish_status`,
        Jobs.version AS `Jobs__version`,
        Jobs.created_by AS `Jobs__created_by`,
        Jobs.created AS `Jobs__created`,
        Jobs.modified AS `Jobs__modified`,
        Jobs.deleted AS `Jobs__deleted`,
        JobCategories.id AS `JobCategories__id`,
        JobCategories.name AS `JobCategories__name`,
        JobCategories.sort_order AS `JobCategories__sort_order`,
        JobCategories.created_by AS `JobCategories__created_by`,
        JobCategories.created AS `JobCategories__created`,
        JobCategories.modified AS `JobCategories__modified`,
        JobCategories.deleted AS `JobCategories__deleted`,
        JobTypes.id AS `JobTypes__id`,
        JobTypes.name AS `JobTypes__name`,
        JobTypes.job_category_id AS `JobTypes__job_category_id`,
        JobTypes.sort_order AS `JobTypes__sort_order`,
        JobTypes.created_by AS `JobTypes__created_by`,
        JobTypes.created AS `JobTypes__created`,
        JobTypes.modified AS `JobTypes__modified`,
        JobTypes.deleted AS `JobTypes__deleted` 
    FROM
        jobs Jobs 
    INNER JOIN
        job_categories JobCategories 
            ON (
                JobCategories.id = (
                    Jobs.job_category_id
                ) 
                AND (
                    JobCategories.deleted
                ) IS NULL
            ) 
    INNER JOIN
        job_types JobTypes 
            ON (
                JobTypes.id = (
                    Jobs.job_type_id
                ) 
                AND (
                    JobTypes.deleted
                ) IS NULL
            )
                </div>
            </div>
        </div>
    </body>
</html>
