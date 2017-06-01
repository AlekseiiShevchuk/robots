var app = new Vue({
    el: '#app',
    data: {
        x_length: 1,
        y_length: 1,
        disabled: false,
        drew: false,
        settings: {},

    },
    methods: {
        drow: function () {
            for (y = 1; y <= this.y_length; y++) {
                for (x = 1; x <= this.x_length; x++) {
                    this.settings['x_' + x + 'y_' + y] = {
                        class: 'col-xs-1 cell free-cell',
                        type: 'free',
                    };
                }
            }
            this.disabled = true;
            this.drew = true;
        },
        saveCurrentCellSettings: function (x, y) {

            if (this.settings['x_' + x + 'y_' + y].type == 'free') {

                this.settings['x_' + x + 'y_' + y].type = 'block';
                this.settings['x_' + x + 'y_' + y].class = 'col-xs-1 cell block-cell';
                this.$forceUpdate();
                console.log('new Type = ' + this.settings['x_' + x + 'y_' + y].type + '; new Class = ' + this.settings['x_' + x + 'y_' + y].class);

            } else if (this.settings['x_' + x + 'y_' + y].type == 'block') {

                this.settings['x_' + x + 'y_' + y].type = 'free';
                this.settings['x_' + x + 'y_' + y].class = 'col-xs-1 cell free-cell';
                this.$forceUpdate();
                console.log('new Type = ' + this.settings['x_' + x + 'y_' + y].type + ' new Class = ' + this.settings['x_' + x + 'y_' + y].class);

            }

        },
        cellClass: function (x, y) {
            return this.settings['x_' + x + 'y_' + y].class
        }


    },
    computed: {}
});
