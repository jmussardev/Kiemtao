// Module app
// il contient tous les codes JS utiles pour ce site
let app = {
    userNameElement : document.getElementById('field-username'),
    passwordElement : document.getElementById('field-password'),
    init: function() {
        console.log('app.init()');
        let formElement = document.getElementById('login-form');
        app.userNameElement.addEventListener('blur', app.handleCheckInputContent);
        app.passwordElement.addEventListener('blur', app.handleCheckInputContent);
        formElement.addEventListener('submit', app.handleFormSubmit);
        // console.log(app.userNameElement);
        // console.log(app.passwordElement);
        // console.log(formElement);
    },

    handleFormSubmit: function(evt) {
        // evt.preventDefault();
        console.log("submit OK");
        // on vérifie les champs input du formulaire pour savoir
        // s'il y a des erreurs et stocke des erreurs dans un tableau
        let errors = [];

        // l'intifiant est-il une erreur ?
        if (!app.isInputLengthValidU(app.userNameElement)) {
            //pour ajouter un élément dans un tableau on utilise push
            errors.push("L'identifiant doit contenir au moins 4 caractères.");
        }

        // le mot de passe est-il en erreur ?
        if (!app.isInputLengthValidP(app.passwordElement)) {
            errors.push("Le mot de passe doit contenir au moins 3 caractères.");
        }

        //on affiche le nombre d'erreurs détectées
        console.log(errors.length);
        console.log(errors);
        

        if (errors.length > 0) {
            //si on détecte des erreurs, on empêche la soumission du formulaire
            evt.preventDefault();

            //pour chaque erreur détectée, on ajoute un message dans le div
            //dédié à l'affichage des erreurs

            //on récupère la div
            let errorElement = document.getElementById('errors');

            // On vide les erreurs précédentes
            errorElement.innerHTML = '';

            //on crée un élément ul qui contiendra la liste des erreurs
            //attention créer ne va pas dire ajouté dans le DOM
            let newUlElement = document.createElement('ul');

            //on parcourt la liste des erreurs avec for
            for (let i = 0 ; i < errors.length ; i++) {
                //on récupère  le message d'erreur
                const errorMessage = errors[i];

                //on crée l'élément li
                newUlElement.innerHTML += '<li class="error">'+ errorMessage +'</li>';

                //autre façon de faire avec createElement
                //mais ca va demander plus de code
                // let newLiElement = document.createElement('li');
                // newLiElement.className = 'error';
                // newLiElement.textContent = errorMessage;
                // newUlElement.appendChild(liElement); 
            }

            //on ajoute l'élément ul dans le DOM le div dédié aux erreurs 
            errorElement.appendChild(newUlElement);
            
        }

        


    },
    
    //méthode chargée de vérifier que le contenue d'un champ input est valide
    //visuellment, on affichera :
    // une bordure verte si le champ est valide
    // une bordure rouge si le champ est invalide
    handleCheckInputContent: function(evt) {
        console.log('blur OK');
        // console.log(evt);
        //récupération d l'élément input à l'origine de l'évènement blur
        let targetInputElement = evt.currentTarget;
        console.log (targetInputElement.value);
        

        // console.log('targetInputElement : '+ targetInputElement.id);
        // selon la validité du champ, on change le style de l'input
        //on récupère la valeur saisie dans le champs de l'input
        // let inputValue = targetInputElement.value;

        // avec la méthode isInputLengthValid, plus besion d'avoir à récupérer
        //la valeur de l'input
        if (app.isInputLengthValidU(targetInputElement)) {
            // C'est OK : le champs est valide
            targetInputElement.classList.remove('invalid');
            targetInputElement.classList.add('valid');
        } else {
            // c'est KO : le champs est invalide 
            targetInputElement.classList.remove('valid');
            targetInputElement.classList.add('invalid');
        }
        // if (app.isInputLengthValidP(targetInputElement)) {
        //     // C'est OK : le champs est valide
        //     targetInputElement.classList.remove('invalid');
        //     targetInputElement.classList.add('valid');
        // } else {
        //     // c'est KO : le champs est invalide 
        //     targetInputElement.classList.remove('valid');
        //     targetInputElement.classList.add('invalid');
        // }
    },
    //méthode prenant en entrée un élément de type input
    // et retournant un booléen selon si la valeur de l'input
    //est suffisament longue ou non (nombre de caractère >= 3)
    isInputLengthValidU: function(inputElement) {
        if (inputElement.value.length >= 4) {
            return true;
        } else {
            return false;
        }
        // de façon équivalente, on peut écrire en une seule ligne :
        // return (inputElement.value.lentgh >= 3);
    },
    isInputLengthValidP: function(inputElement) {
        if (inputElement.value.length >= 3) {
            return true;
        } else {
            return false;
        }
        // de façon équivalente, on peut écrire en une seule ligne :
        // return (inputElement.value.lentgh >= 3);
    },

};

// au chargement du DOM, on demande au navigateur d'exécuter la méthode app.init()
document.addEventListener('DOMContentLoaded', app.init);