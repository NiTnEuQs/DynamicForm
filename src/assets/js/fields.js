class DynamicField {

    constructor(title, description) {
        this.id = 0;
        this.title = title !== '' ? title : 'Titre';
        this.description = description !== '' ? description : 'Description';
        this.isRequired = false;

        this.checkboxes = '';
    }

    enableIsRequired() {
        this.isRequired = true;
        return this;
    }

    toElement(fieldTitle = '') {
        return '<label class="h2">' + fieldTitle + '</label><br/>' +
            '<div class="col-md-2"><label><input type="checkbox" value="on" ' + (this.isRequired ? 'checked' : '') + '/>Obligatoire</label></div>' +
            this.checkboxes +
            '<div class="col-md-12"><input type="text" class="form-control" placeholder="' + this.title + '" /></div>' +
            '<div class="col-md-12"><textarea class="form-control" placeholder="' + this.description + '" style="resize: none"></textarea></div>';
    }

}

class DynamicText extends DynamicField {

    constructor(title = '', description = '') {
        super(title, description);
        this.numbersOnly = false;
    }

    enableNumbersOnly() {
        this.numbersOnly = true;
        return this;
    }

    toElement() {
        let element = document.createElement('div');

        this.checkboxes += '<div class="col-md-2"><label><input type="checkbox" value="on" />Nombres seulement</label></div>';

        element.innerHTML = super.toElement('TEXTE');

        return element;
    }

}

class DynamicRadio extends DynamicField {

    constructor(title = '', description = '') {
        super(title, description);
        this.options = [];
    }

    toElement() {
        let element = document.createElement('div');

        element.innerHTML = super.toElement('RADIO');

        return element;
    }

}