var app = new Vue({
    el: '#app',
    data: {
        x_length: 1,
        y_length: 1,
        disabled: false,
        drew: false,
        settings: {
            x_length: this.x_length,
            y_length: this.y_length,
        },

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
                this.settings['x_' + 1 + 'y_' + 1] = {
                    class: 'col-xs-1 cell start-cell',
                    type: 'start',
                };
            }
            this.disabled = true;
            this.drew = true;
        },
        saveCurrentCellSettings: function (x, y) {
            if (x == 1 && y == 1) {
                return
            }
            var currentCell = this.settings['x_' + x + 'y_' + y];
            if (currentCell.type == 'free') {

                currentCell.type = 'block';
                currentCell.class = 'col-xs-1 cell block-cell';
                this.$forceUpdate();
                console.log('new Type = ' + currentCell.type + '; new Class = ' + currentCell.class);

            } else if (currentCell.type == 'block') {

                currentCell.type = 'free';
                currentCell.class = 'col-xs-1 cell free-cell';
                this.$forceUpdate();
                console.log('new Type = ' + currentCell.type + ' new Class = ' + currentCell.class);

            }

        },
        cellClass: function (x, y) {
            return this.settings['x_' + x + 'y_' + y].class
        },

        serializedSettings: function () {
            var preparedSettings = JSON.parse(JSON.stringify(this.settings));
            for (coordinate in preparedSettings){
                delete preparedSettings.coordinate.class
            }
            return JSON.stringify(preparedSettings)
        }

    },
    computed: {}
});
