import DataTable from 'datatables.net-dt';
import 'datatables.net-buttons-dt';
import 'datatables.net-select-dt';
import 'datatables.net-editor-dt';
import 'datatables.net-datetime';

window.DataTable = DataTable;

export default (Alpine) => {
    Alpine.data('datatables', ({ options = {}, errMode = 'alert' } = {}) => ({
        init() {
            DataTable.ext.errMode = errMode;

            this.table = new DataTable(this.$refs.table, options);
        },
    }));
};
