
var express        = require( 'express' );
var http           = require( 'http' );
var path           = require( 'path' );
var fs             = require('fs');
var stylus         = require('stylus');
var session = require('client-sessions');

var bodyParser     = require( 'body-parser' );

var logger         = require( 'morgan' );

var static         = require( 'serve-static' );

var app    = express();

var router = express.Router();
var nib = require('nib');
var Sequelize = require('sequelize');

sequelize = new Sequelize('vtmiage', 'root', '', {
      dialect: "mysql", // or 'sqlite', 'postgres', 'mariadb'
      port:    3306, // or 5432 (for postgres)
    });

// check database connection
sequelize
  .authenticate()
  .then(function(err) {
    console.log('Connection has been established successfully.');
  }, function (err) { 
    console.log('Unable to connect to the database:', err);
  });


app.use(express.static(__dirname +  '/public')); 
// all environments
//app.set( 'port', process.env.PORT || 3001 );
//app.engine( 'html', engine );
app.set( 'views',  __dirname + '/public/' );
//app.set( 'view engine', 'html' );



  // Middleware to compile `styl` files to `css`.
  // For example, `assets/stylesheets/main.styl` will be compiled to `public/stylesheets/main.css`
/*    app.use(stylus.middleware({
    // Source directory
	src: __dirname + '/public',
        // Compile function
	compile: function(str, path) {
	    return stylus(str)
		.set('filename', path)
		.set('compress', true).use(nib());
	}
    }));*/



//app.use( favicon( __dirname + '/public/favicon.ico' ));
app.use( logger( 'dev' ));
app.set('json spaces', 4);
//app.use(methodOverride());
//app.use( cookieParser());
app.use( bodyParser.json());
app.use( bodyParser.urlencoded({ extended : true  }));



var Matiere = sequelize.define('Matiere', {
    nom: {type: Sequelize.STRING, unique: false},
    description: {type : Sequelize.TEXT, allowNull : true}
},
 {
     instanceMethods: {
	 getInfos: function(){
	     return [this.nom, this.description].join(' ')
	 }
     }
 })

var Filiere = sequelize.define('Filiere', {
    nom: {type: Sequelize.STRING, unique: true}
    //description: Sequelize.TEXT
},
 {
     instanceMethods: {
	 getInfos: function(){
	     return [this.nom]
	 }
     }
 })



//var matiere1 = Matiere.build({ nom: 'Math', description: 'analyse numerique pour la fac' });


//filiere1.setMatiere('matiere1');

//myFiliere.setMatiere(myMatiere);


/*var myMatiere = Matiere.find({where :{nom: 'Math'}}).then(
    function(matiere) { console.log("matiere trouvee") },
    function(err) { console.log(err)}
);
*/
//matiere1.save();    

//var filiere1 = Filiere.build({ nom: 'M2 Miage APP'});
//filiere1.save();

/*
var myFiliere = Filiere.find({where :{nom: 'M2 Miage APP'}}).then(
    function(filiere) { console.log("filiere trouvee") },
    function(err) { console.log(err)}
);
*/
sequelize.sync();
Filiere.hasMany(Matiere);
Matiere.belongsTo(Filiere);
//myMatiere.setFiliere(myFiliere);
var mats = Matiere.all();
var fils = Filiere.all();

sequelize.sync();


app.get('/', function(req, res) {
    res.render('index'); 
});

app.get('/matiere', function(req,res){
    res.send(mats);
});
app.get('/matiere/:id', function(req,res){
    res.send("matiere " + req.params.id);
});
app.get('/enseignement', function(req,res){});
app.get('/enseignement/:id', function(req,res){});

app.get('/filiere', function(req,res){
    res.send(fils);
});

app.get('/filiere/:id', function(req,res){});

//Création d'une filiere avec le nom passé en parametre
app.post('/creerFiliere', function(req, res){
var filierePost = Filiere.build({ nom: req.body.nomFiliere});
console.log(req.body.nomFiliere);
filierePost.save().then(function( filierePost){
  console.log("SAUVEGARDE DE : " + filierePost);
  //res.send('Filiere créée !');
  res.redirect('/');
});
//console.log(req.params)
//console.log(req.params.body['nom']);

});


//Création d'une matiere avec le nom passé en parametre
/*app.post('/creerMatiere', function(req, res){
var matierePost = Matiere.build({ nom: req.body.nomMatiere});
console.log(req.body.nomMatiere);
//filierePost.save().then(function( filierePost){
  console.log("SAUVEGARDE DE : " + matierePost);
  //res.send('Filiere créée !');
  res.redirect('/');
});*/

app.post('/creerMatiere', function(req, res){
console.log(req.body.nomMatiere);
console.log(req.body.filiere);
//var filierePost = req.body.filiere;

//From here i received two variable   : req.body.nameMatiere for the name of the Matiere and
//req.body.nameFiliere that be linked to the Matiere,

Filiere.findOne({where:{nom: req.body.filiere}}).then(function(filiere){

Matiere.create({nom : req.body.nomMatiere}).then(function (matiere) {
console.log(" Good Filiere : " + filiere);
    return matiere.setFiliere(filiere);

});
res.redirect('/');
});
});

//Matiere.create({nom : req.body.nomMatiere}).then(function (matiere) {
 // return Filiere.create({nom : req.body.filiere}).then(function (filiere) {
//    var goodFiliere = Filiere.findOne().then(function(filiere){
  //  where: {nom: req.body.filiere}

//console.log(" Good Filiere : " + goodFiliere);
  //  return matiere.setFiliere(goodFiliere);
 // });
//});
//res.redirect('/');
//});


/*
app.get('/user/:email', function (req, res){
var uEmail = req.params.email;
  User.find({mail: uEmail},function(err, result) {
    return res.json(result);
  });
console.log("Email: " + req.params.email);
});
*/


/*
//BY username ??
app.get('/diagramme/byUser', function (req, res){
var uuserName = req.session.user;//req.params.userName;
  Diagramme.find({userName: uuserName},function(err, result) {
    return res.json(result);
  });
console.log("userName: " + req.params.userName);
});*/

/*
//by diagram  name not used
app.get('/diagramme/byName/:diagrammeName', function(req, res){
var udiagrammeName = req.params.diagrammeName;
  Diagramme.find({diagrammeName: udiagrammeName},function(err, result) {
    return res.json(result);
  });
console.log("diagrammeName: " + req.params.diagrammeName);

})*/

/*
app.get('/user/:email/:diagramme', function (req, res){
var uDiagramme = req.params.diagramme;
var uEmail = req.params.email;

  User.find({diagramme: uDiagramme},function(err, result) {
    if(result == 0){
      console.log("null"); 
    }

    return res.json(result);
  });
console.log("User diagram : " + req.params.diagramme);
});*/

/*
app.get('/user/:email/:diagrammeID', function (req, res){
var diagrammeID = req.body.diagrammeID;
  User.findOne({'diagrammeID':diagrammeID},function(err, result) {
    return res.json(result);
  });
  console.log(req.body.diagrammeID); 
});
*/
/*
app.get('/diagramme/:id', function (req, res){
  return Diagramme.findOne(req.params.id, function (err, diagramme) {
    if (!err) {
  
   res.json(diagramme);
    } else {
      return console.log(err);
    }
  });
  console.log("id " + req.params.id);
});

app.get('/diagramme', function (req, res){
  return Diagramme.find(function (err, diagramme) {
    if (!err) {
	
	 res.json(diagramme);
    } else {
      return console.log(err);
    }
  });
});

app.post('/newDiagramme', function (req, res){
  var diagramme;

  console.log("POST: ");
  console.log("Cells :" + req.body.cells);
 //console.log("userName : " + req.body.userName);
 console.log("diagrammeName : " + req.body.diagrammeName);
  diagramme = new Diagramme({
    cells: (req.body.cells),
    userName : (req.session.user),
    diagrammeName : (req.body.diagrammeName),

  });

  diagramme.save(function (err) {
    if (!err) {
      return console.log(typeof req.body.cells);
    } else {
      return console.log(err);
    }
  });
  return res.send( diagramme);
});
 
/*app.post('/newDiagramme', function ( req, res, next ){
  new Diagramme({
      cells : req.body
      
  }).save( function ( err, todo, count ){
    if( err ) return next( err );

  //  res.redirect( '/' );
  res.end("yes");
  });
});
*//*
app.get('/diagramme/:id', function (req, res){
console.log("calllllllleed");
Diagramme.findById({_id: id}, function (err, dia) { 

res.json(dia);
});
*/


/* PUT /todos/:id */
/*
app.put('/save/byName/:diagrammeName', function(req, res, next) {
  Diagramme.findByIdAndUpdate(req.body.diagrammeName, req.body.cells, function (err, post) {
    if (err) return next(err);
    res.json(post);
  });
});

*/
/*  return Diagramme.find(function (err, diagramme) {
    if (!err) {
//  res.contentType('image/jpg'); 
   res.json(diagramme);
   //res.json()
//  res.render('user');
    } else {
      return console.log(err);
    }
  });*/
//});
//Register a user
/*app.post('/newUser', function (req, res){
  var userMail = req.body.mail;
  var userPass = req.body.password;
  console.log("POST: ");
  console.log("Email: "+req.body.mail + "\nPassword: " + req.body.password);// + "\nDiagramme:" + JSON.stringify(req.body.diagramme["cells"]));
  //Here we miss the diagram.cells part no ? yes but that's not required?
  /*if(User.findOne({mail : userMail, password : userPass})){
    console.log("already exist !!");

  }
  else {
  user = new User({
    mail: req.body.mail,
    password: req.body.password,
    //diagramme: req.body.diagramme["cells"]
  });

  user.save(function (err) {
    if (!err) {
      return console.log("created");
      res.redirect('Inscription.html');
    } else {
      return console.log(err);
    }
  });
  return res.redirect('Inscription.html');
//}
});

*/
/*
//login a user
app.post('/login', function (req, res){
  //console.log(req.body);
 User.findOne({mail : req.body.mail}, function(err, user){
  if(!user){
    res.json("Invalid user or password");
  }
  else {
    if(req.body.password == user.password){
      req.session.user = user;
      res.redirect('/bibliotheques.html');
    } 
  
    else {
      res.send('error : invalid email or password');
    }
  }
});
 
});

// return js to send current username to client
app.get('/user.js', function (req, res) {
  if (req.session.user) res.send('var userName = "' + req.session.user.mail + '"');
  else res.send('');
});



app.get('/user', function (req, res){
  return User.find(function (err, user) {
    if (!err) {
//  res.contentType('image/jpg'); 
   res.json(user);
   //res.json()
//  res.render('user');
    } else {
      return console.log(err);
    }
  });
});*/

// Routes
/*
app.use( routes.current_user );
app.get(  '/',            routes.index );
app.post( '/create',      routes.create );
app.get(  '/destroy/:id', routes.destroy );
app.get(  '/edit/:id',    routes.edit );
app.post( '/update/:id',  routes.update );
*/

/*
 development only
if( 'development' == app.get( 'env' )){
  app.use( errorHandler());
}
*/
http.createServer( app ).listen(3000, function (){
  console.log( 'Express server listening on port 3000 ');
});
