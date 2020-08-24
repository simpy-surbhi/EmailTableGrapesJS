/**
 * You can customize the initial state of the module from the editor initialization, by passing the following [Configuration Object](https://github.com/artf/grapesjs/blob/master/src/asset_manager/config/config.js)
 * ```js
 * const editor = grapesjs.init({
 *  assetManager: {
 *    // options
 *  }
 * })
 * ```
 *
 * Once the editor is instantiated you can use its API. Before using these methods you should get the module from the instance
 *
 * ```js
 * const assetManager = editor.AssetManager;
 * ```
 *
 * * [add](#add)
 * * [get](#get)
 * * [getAll](#getall)
 * * [getAllVisible](#getallvisible)
 * * [remove](#remove)
 * * [store](#store)
 * * [load](#load)
 * * [getContainer](#getcontainer)
 * * [getAssetsEl](#getassetsel)
 * * [addType](#addtype)
 * * [getType](#gettype)
 * * [getTypes](#gettypes)
 *
 * @module AssetManager
 */

import defaults from './config/config';
import Assets from './model/Assets';
import AssetsView from './view/AssetsView';
import FileUpload from './view/FileUploader';

export default () => {
 
};
