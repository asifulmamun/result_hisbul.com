document.getElementById('name').innerText = data.name;
document.getElementById('roll').innerText = data.roll;
document.getElementById('branch_name').innerText = data.branch_name;


// Set Results function call in loop
for (let i = 101; i <= 10 + data['total_subject']; i++) {
    set_result_table('sub_name_' + i, '', 'res_id_' + i, data[i]);

    var total_number = data[i] + data[i];
}
console.log(total_number);

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
getJSON('./../uploads/data/subjects.json', function (err, get_subjects) {
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
            set_subject_name(`sub_name_${i + 100}`, `${subjects[i - 1]['subject_name']}`);
        }
        
        // Function set for subject name with specific id
        function set_subject_name(sub_name_id, sub_name) {
            document.getElementById(sub_name_id).innerText = sub_name;
        }
    }
});




