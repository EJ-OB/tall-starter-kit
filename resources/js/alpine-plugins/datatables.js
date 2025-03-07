import DataTable from 'datatables.net-dt';
import Select from 'datatables.net-select-dt';
import Editor from 'datatables.net-editor-dt';

DataTable.use(Select);
DataTable.use(Editor);

export default (Alpine) => {
    Alpine.data('datatables', ({ options = {}, errMode = 'alert' } = {}) => ({
        init() {
            DataTable.ext.errMode = errMode;

            this.table = new DataTable(this.$refs.table, options);
        },
    }));
};
