/** return string like $9,999,99 **/
export const FormatPrice = (n) => {
    if (n === null || n === undefined) return '';
    return '$' + n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}