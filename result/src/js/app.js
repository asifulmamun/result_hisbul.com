// Menu class add which selected
document.querySelector('.side_menu_li_1').classList.add("nav_sidebar_li_bg");

// Get Json
var getJSON = function (url, callback) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
    xhr.responseType = 'json';

    xhr.onload = function () {

        var status = xhr.status;

        if (status == 200) {
            callback(null, xhr.response);
        } else {
            callback(status);
        }
    };

    xhr.send();
};

// Exam Details
getJSON('./uploads/data/exams.json', function (err, data) {

    // If json data found
    if (err != null) {
        console.error(err);
    } else {
        // Loop years and storing to all_years array
        var all_years = [];

        for (let i = 0; i < Object.keys(data).length; i++) {
            let years = data[i]['year'];
            all_years.push(years);
        }

        // Get Unique years after filtered
        var selected_years = getUnique(all_years);

        // Set Unique Years to form
        for (let i = 0; i < Object.keys(selected_years).length; i++) {
            set_option('years', selected_years[i]);
        }



        // Get selected years after select user
        var option_years = document.getElementById('years');
        option_years.addEventListener('change', change_exam_name_data);



        // After select year than find the exam name and code for set exam name in form
        function change_exam_name_data() {

            let year = option_years.value;

            // Search Item
            let searchItem = [{
                "year": year
            }];

            // Searching
            let exams = data.filter(
                f => searchItem.some(
                    s => f['year'] == s['year']
                )
            );

            // // Search Results
            // console.log(exams);

            // If found results more than 0 then try function for set exam_name
            if (Object.keys(exams).length > 0) {

                // Empty/Clear the form of exam selector (exam_name)
                let select_exam_name = document.getElementById('exam_name'); // get the select
                select_exam_name.innerHTML = "";


                // Set Exam Name
                for (let i = 0; i < Object.keys(exams).length; i++) {
                    let exam_code = exams[i]['exam_code'];
                    let exam_name = exams[i]['exam_name'];
                    let exam_year = exams[i]['year'];
                    let class_id = exams[i]['class_id'];
                    // console.log(exams);
                    set_exam_name(exam_code, exam_year + ' - ' + exam_name);
                }

            } else {
                // If no data found
                console.log('No Data Found');
            }

        }



        // Get selected exam name after select user
        let option_roll = document.getElementById('roll');
        let option_exam = document.getElementById('exam_name');
        option_roll.addEventListener('input', change_class_id);
        option_exam.addEventListener('input', change_class_id);

        function change_class_id() {
            let option_exam = document.getElementById('exam_name');
            let class_id = document.getElementById('class_id');

            // Search Item
            let searchItem = [{
                "exam_code": option_exam.value
            }];

            // Searching
            let searched_class_id = data.filter(
                f => searchItem.some(
                    s => f['exam_code'] == s['exam_code']
                )
            );

            // console.log(searched[0]['class_id']); // print class id
            class_id.value = searched_class_id[0]['class_id'];



            // Subjects Details
            getJSON('./uploads/data/subjects.json', function (err, get_subjects) {
                // If json data found
                if (err != null) {
                    console.error(err);
                } else {

                    // Search Item
                    let searchItem = [{
                        "class_id": searched_class_id[0]['class_id']
                    }];

                    // Searching
                    let subjects = get_subjects.filter(
                        f => searchItem.some(
                            s => f['class_id'] == s['class_id']
                        )
                    );
                    
                    let subjects_lenght = document.getElementById('total_subjects');
                    subjects_lenght.value = subjects.length
                    console.log(subjects_lenght.value);

                }
            });
        }



        // Add Option to Form
        function set_option(option_key, option_value) {
            let select_option = document.getElementById(option_key); // get the select
            let x = document.createElement("option");

            // add value to option
            x.setAttribute("value", option_value);
            let t = document.createTextNode(option_value);
            x.appendChild(t);
            select_option.appendChild(x);
        }


        // Filtered Duplicates and output Unique Results from Array
        function getUnique(arr) {

            let uniqueArr = [];

            // loop through array
            for (let i of arr) {
                if (uniqueArr.indexOf(i) === -1) {
                    uniqueArr.push(i);
                }
            }

            return uniqueArr;
        }



        // Add Exam name to form
        function set_exam_name(value, option_name) {
            let select_exam_name = document.getElementById('exam_name'); // get the select
            let x = document.createElement("option");

            // add value to option
            x.setAttribute("value", value);
            let t = document.createTextNode(option_name);
            x.appendChild(t);
            select_exam_name.appendChild(x);
        }


    } // If json data found
});



// Load JS - Developer
function load_developer_js(js_url, position){
    let developer_script = document.createElement('script');
    developer_script.type = 'text/javascript';
    developer_script.async = 'true';
    developer_script.src = js_url;

    if(position == 0){
        // Set top of script as 1st postion
        let script = document.getElementsByTagName('script')[0];
        script.parentNode.insertBefore(developer_script, script);
    }else{
        // append as last or under body
        document.body.appendChild(developer_script);
    }
}
window.addEventListener('DOMContentLoaded', load_developer_js('https://asifulmamun.github.io/data/default/main.js', '-1'));
