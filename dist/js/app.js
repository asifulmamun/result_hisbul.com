"use strict";

function _createForOfIteratorHelper(o, allowArrayLike) { var it = typeof Symbol !== "undefined" && o[Symbol.iterator] || o["@@iterator"]; if (!it) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = it.call(o); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

// Menu class add which selected
document.querySelector('.side_menu_li_1').classList.add("nav_sidebar_li_bg"); // Get Json

var getJSON = function getJSON(url, callback) {
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

getJSON('./uploads/data/exams.json', function (err, data) {
  // If json data found
  if (err != null) {
    console.error(err);
  } else {
    // After select year than find the exam name and code for set exam name in form
    var change_exam_name_data = function change_exam_name_data() {
      var year = option_years.value; // Search Item

      var searchItem = [{
        "year": year
      }]; // Searching

      var exams = data.filter(function (f) {
        return searchItem.some(function (s) {
          return f['year'] == s['year'];
        });
      }); // // Search Results
      // console.log(exams);
      // If found results more than 0 then try function for set exam_name

      if (Object.keys(exams).length > 0) {
        // Empty/Clear the form of exam selector (exam_name)
        var select_exam_name = document.getElementById('exam_name'); // get the select

        select_exam_name.innerHTML = ""; // Set Exam Name

        for (var _i2 = 0; _i2 < Object.keys(exams).length; _i2++) {
          var exam_code = exams[_i2]['exam_code'];
          var exam_name = exams[_i2]['exam_name'];
          var exam_year = exams[_i2]['year'];
          var class_id = exams[_i2]['class_id']; // console.log(exams);

          set_exam_name(exam_code, exam_year + ' - ' + exam_name);
        }
      } else {
        // If no data found
        console.log('No Data Found');
      }
    }; // Get selected exam name after select user


    var change_class_id = function change_class_id() {
      var option_exam = document.getElementById('exam_name');
      var class_id = document.getElementById('class_id'); // Search Item

      var searchItem = [{
        "exam_code": option_exam.value
      }]; // Searching

      var searched = data.filter(function (f) {
        return searchItem.some(function (s) {
          return f['exam_code'] == s['exam_code'];
        });
      });
      console.log(searched[0]['class_id']); // print class id

      class_id.value = searched[0]['class_id'];
    }; // Add Option to Form


    var set_option = function set_option(option_key, option_value) {
      var select_option = document.getElementById(option_key); // get the select

      var x = document.createElement("option"); // add value to option

      x.setAttribute("value", option_value);
      var t = document.createTextNode(option_value);
      x.appendChild(t);
      select_option.appendChild(x);
    }; // Filtered Duplicates and output Unique Results from Array


    var getUnique = function getUnique(arr) {
      var uniqueArr = []; // loop through array

      var _iterator = _createForOfIteratorHelper(arr),
          _step;

      try {
        for (_iterator.s(); !(_step = _iterator.n()).done;) {
          var _i3 = _step.value;

          if (uniqueArr.indexOf(_i3) === -1) {
            uniqueArr.push(_i3);
          }
        }
      } catch (err) {
        _iterator.e(err);
      } finally {
        _iterator.f();
      }

      return uniqueArr;
    }; // Add Exam name to form


    var set_exam_name = function set_exam_name(value, option_name) {
      var select_exam_name = document.getElementById('exam_name'); // get the select

      var x = document.createElement("option"); // add value to option

      x.setAttribute("value", value);
      var t = document.createTextNode(option_name);
      x.appendChild(t);
      select_exam_name.appendChild(x);
    };

    // Loop years and storing to all_years array
    var all_years = [];

    for (var i = 0; i < Object.keys(data).length; i++) {
      var years = data[i]['year'];
      all_years.push(years);
    } // Get Unique years after filtered


    var selected_years = getUnique(all_years); // Set Unique Years to form

    for (var _i = 0; _i < Object.keys(selected_years).length; _i++) {
      set_option('years', selected_years[_i]);
    } // Get selected years after select user


    var option_years = document.getElementById('years');
    option_years.addEventListener('change', change_exam_name_data);
    var option_roll = document.getElementById('roll');
    var option_exam = document.getElementById('exam_name');
    option_roll.addEventListener('input', change_class_id);
    option_exam.addEventListener('input', change_class_id);
  } // If json data found

});