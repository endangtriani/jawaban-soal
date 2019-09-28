function profile() {
  return{
    name  : 'Endang Triani',
    age   : '22',
    address : 'jl. cemara no. 14 Medan',
    hobbies : ['watching a movie,listening a music'],
    is_married : false,
    school : [{
        'highSchool' : 'SMAN 10 Medan',
        'year_in': '2013',
        'year_out':'2015',
        'university':'null',
    }],
    skill : [{
          'name' : 'web programming',
          'level': 'beginner',
    }],
    interest_in_coding : true,
  }
}
var prof = profile();

console.log(JSON.stringify(prof));
