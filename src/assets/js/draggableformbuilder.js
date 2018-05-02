// DRAGGABLE FORM BUILDER (MAIN CLASS)

let formBuilders = [];

class DraggableFormBuilder {

    constructor(array) {
        this.id = formBuilders.length; // L'id du FormBuilder en question (pour pouvoir le retrouver dans la liste des FormBuilders)
        this.form = {}; // La liste des champs du Formulaire
        this.formLastFieldID = 0; // Dernière ID dans la liste des champs du Formulaire
        this.components = {}; // La liste des composants du FormBuilder
        if (array.selector !== null) this.selector = array.selector; // Le selecteur de la <div>
        if (array.removeComponent !== null) this.componentsToRemove = array.removeComponent; // La liste des composants à supprimer de la liste

        this.registerComponent(new Component('text', 'Texte', 'fa fa-font', DynamicText));
        this.registerComponent(new Component('radio', 'Boutons radio', 'fa fa-dot-circle-o', DynamicRadio));
        this.registerComponent(new Component('list', 'Liste', 'fa fa-list-ul', DynamicText));
        this.registerComponent(new Component('interval', 'Intervalle', 'fa fa-arrows-h', DynamicText));
        this.registerComponent(new Component('checkbox', 'Cases à cocher', 'fa fa-check', DynamicText));
        this.registerComponent(new Component('eval', 'Evaluation', 'fa fa-star', DynamicText));
        this.registerComponent(new Component('camera', 'Photo', 'fa fa-camera', DynamicText));

        let self = this;
        if (array.addComponent !== null) {
            array.addComponent.forEach(function (elem) {
                self.registerComponent(elem);
            });
        }

        formBuilders[this.id] = this;
    }

    registerComponent(component) {
        if (!this.componentsToRemove.includes(component.id)) {
            component.formBuilderID = this.id;
            this.components[component.id] = component;
        }
    }

    constructComponents() {
        let str =
            '<span class="h1">Composants</span>' +
            '<hr>' +
            '<div class="dynamic-container">';

        Object.values(this.components).forEach(function (elem) {
            str += elem.toHTML();
        });

        str += '</div>';

        return str;
    }

    draw() {
        let str =
            '<div class="separated">' +
            '   <div class="col-sm-2 text-center">' + this.constructComponents() + '</div>' +
            '   <div class="col-sm-10 text-center">' +
            '       <span class="h1">Formulaire</span>' +
            '       <hr>' +
            '       <div class="dynamic-container">' +
            '           <div id="dynamic-form" class="dynamic-form" ondrop="drop(event)" ondragover="allowDrop(event)"></div>' +
            '       </div>' +
            '   </div>' +
            '   <div style="clear: both;"></div>' +
            '</div>';

        $(this.selector).append(str);
    }

    addField(target, field) {
        let self = this;

        let component = document.createElement('div');
        component.className = 'dynamic-field-component';
        component.dataset.fieldid = '' + this.formLastFieldID;
        component.append(field.toElement());

        // Action delete button
        let actionDelete = document.createElement('div');
        actionDelete.className = 'btn btn-danger dynamic-deleteButton ';
        actionDelete.onclick = function () {
            parent.parentNode.removeChild(parent);
            delete self.form[parent.firstChild.dataset.fieldid];
            console.log(self.form);
        };
        actionDelete.innerHTML = '<i class="fa fa-trash-o"></i>';

        component.append(actionDelete);

        // Parent div
        let parent = document.createElement('div');
        parent.className = 'col-md-12 dynamic-form-container';
        parent.append(component);

        // Target element
        target.append(parent);

        this.form[this.formLastFieldID++] = field;
    }

    toFormJSON() {
        return JSON.stringify(this.form);
    }

}

// COMPONENT

class Component {

    constructor(id, title, icon, field) {
        this.id = id;
        this.title = title;
        this.icon = icon;
        this.field = field;
        this.formBuilderID = null;
    }

    toHTML() {
        return '<div id="' + this.id + '" class="dynamic-component" draggable="true" ondragstart="drag(event)" data-formbuilderid="' + this.formBuilderID + '"><span>' + this.title + '</span><i class="' + this.icon + '"></i></div>';
    }

}

// FUNCTIONS

function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData('componentID', ev.target.id);
    ev.dataTransfer.setData('formBuilderID', ev.target.dataset.formbuilderid);
}

function drop(ev) {
    ev.preventDefault();

    let componentID = ev.dataTransfer.getData('componentID');
    let formBuilder = formBuilders[ev.dataTransfer.getData('formBuilderID')];
    let field = formBuilder.components[componentID].field;

    formBuilder.addField(ev.target.closest('#dynamic-form'), new field());

    console.log(formBuilder.form);
}
