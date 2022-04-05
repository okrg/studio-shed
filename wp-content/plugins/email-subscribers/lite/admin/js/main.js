import '../css/style.css';
import GalleryItemsPage from './src/views/GalleryItemsPage';

global.__ = wp.i18n.__;
global._x = wp.i18n._x;
global.sprintf = wp.i18n.sprintf;

const campaignGalleryItemsWrapper = document.querySelector('#ig-es-campaign-gallery-items-wrapper');

let campaignType = location.search.split('campaign-type=')[1];
let campaignId   = location.search.split('campaign-id=')[1];

if ( 'undefined' === typeof campaignType ) {
    campaignType = ig_es_main_js_data.post_notification_campaign_type;
}

if ( 'undefined' === typeof campaignId ) {
    campaignId = 0;
}

m.mount(
    campaignGalleryItemsWrapper, 
    {
        view: () => {
            return <GalleryItemsPage campaignId={campaignId} campaignType={campaignType}/>
        }
    }
);




