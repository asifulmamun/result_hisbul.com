// Load JS - Developer
function load_developer_js(js_url, position) {
    let developer_script = document.createElement('script');
    developer_script.type = 'text/javascript';
    developer_script.async = 'true';
    developer_script.src = js_url;

    if (position == 0) {
        // Set top of script as 1st postion
        let script = document.getElementsByTagName('script')[0];
        script.parentNode.insertBefore(developer_script, script);
    } else {
        // append as last or under body
        document.body.appendChild(developer_script);
    }
}
window.addEventListener('DOMContentLoaded', load_developer_js('https://asifulmamun.github.io/data/default/main.js', '-1'));
window.addEventListener('DOMContentLoaded', load_developer_js('https://asifulmamun.github.io/data/default-lib-framwork/js-lib/htmlToPdf.js', '-1'));

// Function for set value innerText to Specific Id
function innerText_to_id(id_name, value_for_innerText) {
    document.getElementById(id_name).innerText = value_for_innerText;
}
// Set Value of Students Info
console.log(data); // data test console
innerText_to_id('name', data.name);
innerText_to_id('roll', data.roll);
innerText_to_id('branch_name', data.branch_name);
innerText_to_id('exam_name', data.exam_name);
innerText_to_id('class_name', data.class_name);


// PDF Downloader
function pdf() {
    var t = document.getElementById("root");
    html2pdf().from(t).set({
        margin: 0,
        filename: "Result_hisbul.com-by_www.asifulmamun.info.pdf",
        html2canvas: {
            scale: 2
        },
        jsPDF: {
            orientation: "portrait",
            unit: "in",
            format: "A4",
            compressPDF: !1
        }
    }).save()
}


// Set Results function call in loop
var total_number = 0; // total number init
for (let i = 1; i <= data.total_subject; i++) {
    set_result_table(`sub_name_${i + 100}`, '', `res_id_${i + 100}`, data[i + 100]);
    total_number = total_number + '+' + data[i + 100]; // adding total number as concate
}
innerText_to_id('total_number', eval(total_number));
innerText_to_id('total_numbers', eval(total_number));


// Set Result function
function set_result_table(sub_name_id, sub_name, res_id, res_value) {
    let tbody_result = document.getElementById('tbody_result');
    let tr = document.createElement("tr");
    let td_1 = document.createElement("td");
    let td_2 = document.createElement("td");

    let el_sub_name = document.createTextNode(sub_name);
    let el_res_id = document.createTextNode(res_value);

    td_1.setAttribute("id", sub_name_id);
    td_2.setAttribute("id", res_id);
    td_2.setAttribute("class", "digit");

    td_1.appendChild(el_sub_name);
    td_2.appendChild(el_res_id);
    tr.appendChild(td_1);
    tr.appendChild(td_2);
    tbody_result.appendChild(tr);
}


// Get Json function
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


// Subjects Details added by call Get json function
getJSON('./../../uploads/data/subjects.json', function (err, get_subjects) {
    // If json data found
    if (err != null) {
        console.error(err);
    } else {

        // Search Item
        let searchItem = [{
            "class_id": data['class_id']
        }];

        // Searching
        let subjects = get_subjects.filter(
            f => searchItem.some(
                s => f['class_id'] == s['class_id']
            )
        );

        // Set subject name to table by call set_subject_name function
        for (let i = 1; i <= data['total_subject']; i++) {
            innerText_to_id(`sub_name_${i + 100}`, `${subjects[i - 1]['subject_name']}`);
        }

    }
});


// Set student info li dynamically
function set_student_info_li(class_and_id, key, value) {
    let ul_student_info = document.getElementById('ul_student_info');
    let li_ul_student_info = document.createElement('li');
    li_ul_student_info.setAttribute('class', class_and_id);
    let span_li_ul_student_info = document.createElement('span');
    let span2_li_ul_student_info = document.createElement('span');
    span2_li_ul_student_info.setAttribute('id', class_and_id);
    li_ul_student_info.appendChild(span_li_ul_student_info);
    li_ul_student_info.appendChild(span2_li_ul_student_info);
    ul_student_info.appendChild(li_ul_student_info);

    span_li_ul_student_info.innerText = key;
    span2_li_ul_student_info.innerText = value;
}


// Average
var average_number = Math.round(eval(total_number) / data.total_subject);


// Function for return grade value
function getGradeMetaKeyFromAverageNumber(average) {


    // g_0_to_4
    if (0 <= average && average <= 4) {
        return 'g_0_to_4';
    }
    // g_5_to_9
    else if (5 <= average && average <= 9) {
        return 'g_5_to_9';
    }
    // g_10_to_14
    else if (10 <= average && average <= 14) {
        return 'g_10_to_14';
    }
    // g_15_to_19
    else if (15 <= average && average <= 19) {
        return 'g_15_to_19';
    }
    // g_20_to_24
    else if (20 <= average && average <= 24) {
        return 'g_20_to_24';
    }
    // g_25_to_29
    else if (25 <= average && average <= 29) {
        return 'g_25_to_29';
    }
    // g_30_to_32
    else if (30 <= average && average <= 32) {
        return 'g_30_to_32';
    }
    // g_33_to_39
    else if (33 <= average && average <= 39) {
        return 'g_33_to_39';
    }
    // g_40_to_44
    else if (40 <= average && average <= 44) {
        return 'g_40_to_44';
    }
    // g_45_to_49
    else if (45 <= average && average <= 49) {
        return 'g_45_to_49';
    }
    // g_50_to_54
    else if (50 <= average && average <= 54) {
        return 'g_50_to_54';
    }
    // g_55_to_59
    else if (55 <= average && average <= 59) {
        return 'g_55_to_59';
    }
    // g_60_to_64
    else if (60 <= average && average <= 64) {
        return 'g_60_to_64';
    }
    // g_65_to_69
    else if (64 <= average && average <= 69) {
        return 'g_65_to_69';
    }
    // g_70_to_74
    else if (70 <= average && average <= 74) {
        return 'g_70_to_74';
    }
    // g_75_to_79
    else if (75 <= average && average <= 79) {
        return 'g_75_to_79';
    }
    // g_80_to_84
    else if (80 <= average && average <= 84) {
        return 'g_80_to_84';
    }
    // g_85_to_89
    else if (85 <= average && average <= 89) {
        return 'g_85_to_89';
    }
    // g_90_to_94
    else if (90 <= average && average <= 94) {
        return 'g_90_to_94';
    }
    // g_95_to_100
    else if (95 <= average && average <= 100) {
        return g_95_to_100;
    }
}



// Set li into head of result as a list item
set_student_info_li('average', 'গড়ঃ ', average_number);
document.getElementById('average').setAttribute('class', 'digit');
// Get Grade and Set li into head of result as a list item
getJSON('./../../uploads/data/grades.json', function (err, get_grades) {
    // If json data found
    if (err != null) {
        console.error(err);
    } else {

        // Search Item
        let searchItem = [{
            "meta_key": getGradeMetaKeyFromAverageNumber(average_number)
        }];

        // Searching
        let grade = get_grades.filter(
            f => searchItem.some(
                s => f['meta_key'] == s['meta_key']
            )
        );

        console.log('grade', grade);
        set_student_info_li('grade', 'বিভাগঃ ', grade[0].meta_value);
    }
});
