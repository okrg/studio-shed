window.Harp = {}
BABYLON.OBJFileLoader.OPTIMIZE_WITH_UV = true
BABYLON.OBJFileLoader.SKIP_MATERIALS = true
BABYLON.ArcRotateCamera.prototype.spinTo = function (whichprop, targetval, speed) {
  var ease = new BABYLON.CubicEase()
  ease.setEasingMode(BABYLON.EasingFunction.EASINGMODE_EASEINOUT)
  BABYLON.Animation.CreateAndStartAnimation('at4', this, whichprop, speed, 120, this[whichprop], targetval, 0, ease)
}

window.addEventListener('DOMContentLoaded', () => {

  const canvas = document.getElementById('renderCanvas')
  const loadEvent = new CustomEvent('configurator_loaded', {
    bubbles: true,
    cancelable: true
  })

  const loader = document.createElement('div')
  function removeLoader() {
    // Remove the #loader element from the DOM
    loader.remove();
  }

// Add an event listener for the 'transitionend' event
  loader.addEventListener('transitionend', removeLoader, { once: true });

  loader.setAttribute('id', 'loader')
  let dots = window.setInterval( function() {
    if ( loader.innerHTML.length > 2 )
      loader.innerHTML = "";
    else
      loader.innerHTML += ".";
  }, 500);

  canvas.before(loader)


  const engine = new BABYLON.Engine(canvas, true, {
    preserveDrawingBuffer: true,
    stencil: true
  });

  const createScene = function () {
    const scene = new BABYLON.Scene(engine)
    scene.useRightHandedSystem = true

    //Material Groups **********
    Harp.materialGroups.forEach(function (group) {
      Harp[group] = new BABYLON.Mesh.CreateBox(group, 1, scene)
      Harp[group + '_material'] = new BABYLON.StandardMaterial(group + '_material', scene)
    })

    //Finish Groups **********
    Harp.finishGroups.forEach(function (group) {
      Harp[group] = new BABYLON.Mesh.CreateBox(group, 1, scene)
      Harp[group + '_material'] = new BABYLON.StandardMaterial(group + '_material', scene)
    })

    //Camera **********
    Harp.camera = new BABYLON.ArcRotateCamera('camera',
      BABYLON.Tools.ToRadians(60),
      BABYLON.Tools.ToRadians(80),
      260,
      new BABYLON.Vector3(0,52,0)
    )
    Harp.camera.zoomToMouseLocation = true
    Harp.camera.useNaturalPinchZoom = true
    Harp.camera.upperBetaLimit = Math.PI / 2
    Harp.camera.upperRadiusLimit = 800
    Harp.camera.lowerRadiusLimit = 12
    Harp.camera.angularSensibilityX = 5000
    Harp.camera.angularSensibilityY = 5000
    Harp.camera.spinTo('beta', 90, 100)
    Harp.camera.attachControl(canvas, true)
    if(Math.min(window.screen.width, window.screen.height) < 768 || navigator.userAgent.indexOf("Mobi") > -1) {
      Harp.camera.inputs.remove(Harp.camera.inputs.attached.mousewheel)
    }

    var pipeline = new BABYLON.DefaultRenderingPipeline(
      "defaultPipeline",
      true,
      scene,
      [Harp.camera]
    );
    pipeline.samples = 8;
    pipeline.imageProcessingEnabled = true;
    pipeline.fxaaEnabled = true;
    pipeline.grainEnabled = true;
    pipeline.grain.intensity = 5;
    pipeline.bloomEnabled = true;
    pipeline.bloomThreshold = 0.8;
    pipeline.bloomWeight = 0.25;
    pipeline.bloomKernel = 16;
    pipeline.bloomScale = 0.5;

    //Lighting **********
    const ambient = new BABYLON.HemisphericLight('ambient', new BABYLON.Vector3(0, 1, 0), scene)
    ambient.diffuse = new BABYLON.Color3(0.8 , 0.8, 0.8)
    ambient.specular = new BABYLON.Color3(0.8 , 0.8, 0.8)
    ambient.groundColor = new BABYLON.Color3(0.8 , 0.8, 0.8)
    ambient.intensity = 1


    const sun = new BABYLON.DirectionalLight('sun', new BABYLON.Vector3(-1, -2, -1), scene)
    sun.position = new BABYLON.Vector3(40, 350, 40)
    //sun.specular = new BABYLON.Color3(0, 0, 0)
    sun.intensity = 0.9
    //sun.bloomEnabled = 0.5

    Harp.shadowGenerator = new BABYLON.ShadowGenerator(1024, sun)
    Harp.shadowGenerator.darkness = 0
    Harp.shadowGenerator.useBlurCloseExponentialShadowMap = true
    Harp.shadowGenerator.useBlurExponentialShadowMap = true
    Harp.shadowGenerator.useKernelBlur = true
    Harp.shadowGenerator.bias = 0.0001
    Harp.shadowGenerator.blurKernel = 36

    Harp.createFoundation = function () {
      // Create the floor using BABYLON.MeshBuilder.CreateBox
      var worldFloor = BABYLON.MeshBuilder.CreateBox("worldFloor", { width: 5000, depth: 5000, height: 1 }, scene);
      worldFloor.position = new BABYLON.Vector3(0, -16, 0); // Center the floor at 0, 0, 0

      // Create a light gray material for the floor
      var worldFloorMaterial = new BABYLON.StandardMaterial("worldFloorMaterial", scene);
      worldFloorMaterial.diffuseColor = new BABYLON.Color3(0.8, 0.8, 0.8); // Light gray
      worldFloorMaterial.specularColor = new BABYLON.Color3(0, 0, 0); // Specular settings
      worldFloor.material = worldFloorMaterial;

      // Set the worldFloor to receive shadows
      worldFloor.receiveShadows = true;
    }

    //Screenshot tool *********
    Harp.pushScreenshot = async function() {
      Harp.screenshotData = { config_uid: Harp.config.config_uid || null }
      const response = fetch('/api/screenshot', {
        method: 'POST',
        body: JSON.stringify(Harp.screenshotData),
        headers: {
          'Content-Type': 'application/json'
        }
      })
      return true
    }


    //Default routine  **********
    Harp.useRecipe = function (size ='10x10', endcut = 'ogee') {
      let l,d
      Harp.config = {}
      Harp.config.product = window.recipe.model
      Harp.config.size = window.recipe.size
      Harp.config.area = window.recipe.length * window.recipe.depth
      Harp.config.length = l = window.recipe.length
      Harp.config.depth = d = window.recipe.depth
      Harp.config.endcut = endcut

      if (Harp.productContainer) {
        Harp.productContainer.dispose()
      } else {
        Harp.productContainer = new BABYLON.AssetContainer(scene)
      }

      BABYLON.SceneLoader.ImportMesh('', 'https://bigtimber-dev.bypboh.com/assets/obj/', Harp.config.product + '-' + Harp.config.size + '-' + endcut + '.obj', scene, function (newMeshes) {
          newMeshes.forEach(function (m){
            console.log(m.name)
            if (m.name.includes('Post')) {
              m.parent = Harp['posts']
              m.material = Harp['posts' + '_material']
              //m.receiveShadows = true
            }
            if (m.name.includes('HardwareBolts')) {
              m.parent = Harp['hardware']
              m.material = Harp['hardware' + '_material']
            } else {
              m.parent = Harp['timber']
              m.material = Harp['timber' + '_material']
            }

            m.enableEdgesRendering();
            m.edgesWidth = 16;
            m.edgesColor =  new BABYLON.Color4(8 / 255, 8 / 255, 8 / 255, 1)



            Harp.productContainer.meshes.push(m)
            //m.receiveShadows = true
            Harp.shadowGenerator.getShadowMap().renderList.push(m);

            Harp.materialGroups.forEach(function (group){
              if (m.name.includes(group)) {
                m.parent = Harp[group]
                m.material = Harp[group + '_material']
              }
            })



            m.position.z = (l*12)/2
            m.position.y = -24
            m.position.x = -(d*12)/2
          })
        })




    }


    let configdata
    Harp.createFoundation()
    Harp.loadDefaultRecipe()

    return scene
  }
  let recipe
  let idx
  const Harp = {
    roofVisible: true,
    sides: ['front', 'back', 'left', 'right'],
    config: {},
    configItems: [],
    configCosts: [],
    panelWidthMap: {},
    sgFauxMap: {},
    ptFauxMap: {
    },
    retail: {
    },
    bomCodes: {
    },
    frontElevationCodes: {
    },
    backElevationCodes: {
    },
    labels: {
      'unfinished-eaves': 'Unfinished',
      'natural-stain': 'Natural Stain',
      'charwood-stain': 'Charwood Stain',
      'factory-primed-white': 'Factory Primed White',
    },
    colors: {
      'pink': 'rgb(255, 20, 255)',
      'studio-shed-bronze': 'rgb(32, 26, 24)',
      'ebony': 'rgb(32, 32, 33)',
      'pebble-gray': 'rgb(140, 130, 110)',
      'unfinished-eaves': 'rgb(222, 222, 222)',
      'unfinished-trim': 'rgb(245, 245, 245)',
      'natural-stain': 'rgb(178, 120, 59)',
      'charwood-stain': 'rgb(75, 60, 48)',
      'cedar-plank': 'rgb(169, 107, 69)',
      'cedar-shake': 'rgb(169, 107, 69)',
      'roof-metal': 'rgb(155, 158, 158)',
      'aluminum': 'rgb(155, 158, 158)',
      'appliance': 'rgb(207, 212, 217)',
      'satin-nickel': 'rgb(181, 182, 181)',
      'black': 'rgb(0, 0, 0)',
      'matte-black': 'rgb(0, 0, 0)',
      'white': 'rgb(255, 255, 255)',
      'fixture': 'rgb(26, 126, 126)',
      'fixture1': 'rgb(26, 126, 126)',
      'white-shaker': 'rgb(245, 241, 238)',
      'grey-shaker': 'rgb(161, 161, 159)',
      'high-gloss-white-flat': 'rgb(242, 242, 239)'
    },
    shadowGroups: [
      'Lantern',
      'Planter',
      'TallPot',
      'ShortPot',
      'TallPlant',
      'ShortPlant',
      'PlanterPlant',
      'lounge_wood'
    ],
    materialGroups: [
      'lounge_cushion',
      'lounge_wood',
      'Deck_Light',
      'Deck_Light_Glass',
      'TallPot',
      'ShortPot',
      'FarPot',
      'TallPlant',
      'ShortPlant',
      'FarPlant',
      'Lantern',
      'LanternGlass',
      'timber',
      'hardware',
      'potsoil',
      'Planter',
      'PlanterPlant',
      'shed_Deck',
      'PAthway_C',
      'Fence',
      'Fence1',
      'Perimeter_wall',
      'Grass_Ground',
      'wood_texture',
      'wood_texture_metal',
      'wood_texture_trims',
      'trim_color',
      'lumber',
      'sheathing',
      'framing'
    ],
    finishGroups: [
      'white',
      'black',
      'fixture'
    ],
    textures: {
      'wood': 'https://bigtimber-dev.bypboh.com/assets/textures/wood.jpg',
      'concrete': 'https://bigtimber-dev.bypboh.com/assets/textures/concrete.jpg',
      'base-lap': 'https://bigtimber-dev.bypboh.com/assets/textures/base_lap.png',
      'cedar-plank': 'https://bigtimber-dev.bypboh.com/assets/textures/cedar-plank.jpg',
      'cedar-shake': 'https://bigtimber-dev.bypboh.com/assets/textures/cedar-shake.jpg',
      'ashlar-oak': 'https://bigtimber-dev.bypboh.com/assets/textures/ashlar-oak.jpg',
      'sandcastle-oak': 'https://bigtimber-dev.bypboh.com/assets/textures/sandcastle-oak.jpg'
    },
    setColor: function (group, rgb) {
      if(!rgb) return
      rgb = rgb.substring(4, rgb.length-1).replace(/ /g, '').split(',')
      color = new BABYLON.Color3.FromInts(rgb[0], rgb[1], rgb[2])
      for (var i = 0; i < Harp[group].getChildMeshes(false).length; i++){
        Harp[group].getChildMeshes(false)[i].material.diffuseColor = color
      }
    },
    setUnitSize: function(size, endcut = 'ogee') {
      //convert a string like 10x12 to an length and depth
      window.recipe.size = size
      window.recipe.length = size.split('x')[0]
      window.recipe.depth = size.split('x')[1]
      window.recipe.endcut = endcut
      Harp.useRecipe(window.recipe.size, window.recipe.endcut)
    },
    setEndCut: function(endcut) {
      window.recipe.endcut = endcut
      Harp.useRecipe(window.recipe.size, window.recipe.endcut)
    },
    setTrimColor: function(color) {
      Harp.setColor('trim_color', Harp.colors[color])
      Harp.setColor('plank_trim', Harp.colors[color])
      Harp.setColor('plank_trims', Harp.colors[color])
      Harp.setColor('plank_siding_trims', Harp.colors[color])
      Harp.setColor('plank_siding_metal_trims', Harp.colors[color])

      Harp.setColor('wood_texture_trims', Harp.colors[color])
      Harp.setColor('wood_texture_metal_trims', Harp.colors[color])

      Harp.setColor('block_siding_trims', Harp.colors[color])
      Harp.setColor('block_siding_metal_trims', Harp.colors[color])

      Harp.setColor('roof_metal', Harp.colors[color])
      Harp.setColor('metal_wainscot', Harp.colors[color])
      Harp.setColor('metal_wainscot1', Harp.colors[color])
      if(color === 'aluminum') {
        Harp.setSoffitColor('aluminum')
        Harp.setFasciaColor('aluminum')



        if (Object.keys(window.colorway).length > 0 && window.colorway['windowTrim'] === 'ebony') {
          Harp.setColor('window_exterior', Harp.colors['tricorn-black'])
          Harp.updateConfigParam('window_casement', 'ebony', 'Ebony')
        } else {
          Harp.setColor('window_exterior', Harp.colors['pebble-gray'])
          Harp.updateConfigParam('window_casement', 'pebble-gray', 'Pebble Gray')
        }
      }
      if(color === 'studio-shed-bronze') {
        Harp.setSoffitColor('studio-shed-bronze')
        Harp.setFasciaColor('studio-shed-bronze')
        Harp.setColor('window_exterior', Harp.colors['tricorn-black'])
        Harp.updateConfigParam('window_casement', 'ebony', 'Ebony')
      }
      Harp.updateConfigParam('trim_color', color)
    },
    setSiding: function (siding) {
      //Harp['trim_color'].setEnabled(false)
      Harp.config.siding = siding
      Harp.wood_texture.setEnabled(false)
      Harp.wood_texture_metal.setEnabled(false)
      Harp.wood_texture_trims.setEnabled(false)
      Harp.wood_texture_metal_trims.setEnabled(false)

      if (siding == 'cedar_shake') {
        Harp.config.siding_price = Harp.retail.cedar_shake

        if(Harp.config.metal_wainscot) {
          Harp.wood_texture_metal.setEnabled(true)
          Harp.wood_texture_metal_trims.setEnabled(true)
          Harp.setColor('wood_texture_metal', Harp.colors['white'])
          Harp.setColor('wood_texture_metal_trims', Harp.colors[Harp.config.trim_color])
          Harp.wood_texture_metal_material.diffuseTexture = new BABYLON.Texture(Harp.textures['cedar-shake'])
          Harp.wood_texture_metal_material.diffuseTexture.uScale = 0.05
          Harp.wood_texture_metal_material.diffuseTexture.vScale = 0.035
          Harp.config.siding_code = 'CSM'
        } else {
          Harp.wood_texture.setEnabled(true)
          Harp.wood_texture_trims.setEnabled(true)
          Harp.setColor('wood_texture', Harp.colors['white'])
          Harp.setColor('wood_texture_trims', Harp.colors[Harp.config.trim_color])
          Harp.wood_texture_material.diffuseTexture = new BABYLON.Texture(Harp.textures['cedar-shake'])
          Harp.wood_texture_material.diffuseTexture.uScale = 0.05
          Harp.wood_texture_material.diffuseTexture.vScale = 0.035
          Harp.config.siding_code = 'CS'
        }
      }

    },
    ucfirst: function(string) {
      return string[0].toUpperCase() + string.slice(1);
    },
    formatPrice: new Intl.NumberFormat('en-US', {
      style: 'currency',
      currency: 'USD',
      minimumFractionDigits: 0,
      maximumFractionDigits: 0
    }),
    loadDefaultRecipe: function(model = null) {
      let recipeResponse = {}
      if(model == null) {
        model = document.querySelector('#renderCanvas').getAttribute('data-big-timber-model')
      }
      if(model == 'santa-monica-10x10') {
        window.recipe = {"model":"santa-monica","size":"10x10","depth":10,"length":10}
      }

      Harp.useRecipe()

    },
    setCamera: function (side) {
      if(Harp.config.depth <= 14) {
        Harp.camera.spinTo('radius', 450, 100)
      } else {
        Harp.camera.spinTo('radius', 700, 100)
      }
      if (side === 'exterior') {
        if (Harp.camera.beta < BABYLON.Tools.ToRadians(60)) {
          Harp.camera.spinTo('beta', BABYLON.Tools.ToRadians(90), 66)
        }
      }
      if (side === 'interior') {
        Harp.camera.spinTo('alpha', BABYLON.Tools.ToRadians(45), 66)
        Harp.camera.spinTo('beta', BABYLON.Tools.ToRadians(30), 66)
      }
      if (side === 'front') {
        Harp.camera.spinTo('alpha', Math.PI/2, 50)
        Harp.camera.spinTo('beta', Math.PI/2, 50)
      }
      if (side === 'back') {
        Harp.camera.spinTo('alpha', -Math.PI/2, 50)
        Harp.camera.spinTo('beta', Math.PI/2, 50)
      }
      if (side === 'left') {
        Harp.camera.spinTo('alpha', Math.PI, 50)
        Harp.camera.spinTo('beta', Math.PI/2, 50)
      }
      if (side === 'right') {
        Harp.camera.spinTo('alpha', 0, 50)
        Harp.camera.spinTo('beta', Math.PI/2, 50)
      }
    },
    generatePanelMenu: function(side) {
      return
    },
    needsTrimCode: function(panel) {
      return
    },
    getDoor72Qty: function() {
      return
    },
    getDoor36Qty: function() {
      return
    },
    getWindowQty: function() {
      return
    },
    updateOptionsConfigArray: function() {
      return
    },
    updateInteriorConfigArray: function() {
      return
    },
    updateElevationConfig: function(side) {
      return
    },
    updatePanelThumbs: function() {
      return
    },
    updateConfigParam: function(item, sku, label = null, price = null) {
      Harp.config[item] = sku

      if(label !== null) {
        Harp.config[item + '_label'] = label
      }

      if(price !== null) {
        Harp.config[item + '_price'] = price
      }
      if(Harp.bomCodes.hasOwnProperty(sku)) {
        Harp.config[item + '_code'] = Harp.bomCodes[sku]
      }
    },
    calculatePanelCost: function(panel) {
      return
    },
    updateConfig: function() {
      return
    },
    init: function () {
      Harp.materialGroups.forEach(function (group){
        Harp[group].setEnabled(false)
      })
      Harp['timber'].setEnabled(true);
      Harp['hardware'].setEnabled(true);
      Harp['white'].setEnabled(true);
      Harp['black'].setEnabled(true);
      Harp['trim_color'].setEnabled(true)
      Harp['lumber'].setEnabled(true)
      Harp['lounge_wood'].setEnabled(true)
      Harp['lounge_cushion'].setEnabled(true)
      Harp['Fence'].setEnabled(true)
      Harp['Fence1'].setEnabled(true)
      Harp['PAthway_C'].setEnabled(true)
      Harp['shed_Deck'].setEnabled(true)
      Harp['Deck_Light'].setEnabled(true)
      Harp['Deck_Light_Glass'].setEnabled(true)
      Harp['Planter'].setEnabled(true)
      Harp['PlanterPlant'].setEnabled(true)
      Harp['potsoil'].setEnabled(true)
      Harp['TallPot'].setEnabled(true)
      Harp['ShortPot'].setEnabled(true)
      Harp['FarPot'].setEnabled(true)
      Harp['ShortPlant'].setEnabled(true)
      Harp['FarPlant'].setEnabled(true)
      Harp['Lantern'].setEnabled(true)
      Harp['LanternGlass'].setEnabled(true)
      Harp['Perimeter_wall'].setEnabled(true)
      Harp['Grass_Ground'].setEnabled(true)

      let woodTexture = new BABYLON.Texture(Harp.textures['wood'])
      woodTexture.uScale = woodTexture.vScale = 0.015
      woodTexture.specular = 5

      let fenceeTexture = new BABYLON.Texture(Harp.textures['Fence'])
      fenceeTexture.uScale = fenceeTexture.vScale = 0.015
      fenceeTexture.specular = 5

      Harp.setColor('hardware', Harp.colors['black'])


      Harp.setColor('timber', Harp.colors['natural-stain'])
      Harp.timber_material.diffuseTexture = woodTexture
      Harp.timber_material.specularColor = new BABYLON.Color3(0, 0, 0);


      Harp.setColor('lumber', Harp.colors['white'])
      Harp.lumber_material.diffuseTexture = woodTexture

      Harp.setColor('lounge_wood', Harp.colors['pearl-gray'])
      Harp.lounge_wood_material.diffuseTexture = new BABYLON.Texture(Harp.textures['Fence'])

      Harp.setColor('Fence', Harp.colors['pearl-gray'])
      Harp.Fence_material.diffuseTexture = new BABYLON.Texture(Harp.textures['Fence'])

      Harp.setColor('Fence1', Harp.colors['pearl-gray'])
      Harp.Fence1_material.diffuseTexture = new BABYLON.Texture(Harp.textures['Fence'])

      Harp.setColor('PAthway_C', Harp.colors['white'])
      Harp.PAthway_C_material.diffuseTexture = new BABYLON.Texture(Harp.textures['Perimeter_wall'])
      Harp.PAthway_C_material.specularPower = 4
      Harp.PAthway_C_material.specularColor = new BABYLON.Color3(0.125, 0.125, 0.125)
      Harp.setColor('shed_Deck', Harp.colors['white'])
      Harp.shed_Deck_material.diffuseTexture = new BABYLON.Texture(Harp.textures['wood_deck'])
      Harp.shed_Deck_material.specularPower = 4
      Harp.shed_Deck_material.specularColor = new BABYLON.Color3(0.125, 0.125, 0.125)
      Harp.setColor('PlanterPlant', Harp.colors['pearl-gray'])
      Harp.PlanterPlant_material.diffuseTexture = new BABYLON.Texture(Harp.textures['amarili'])
      Harp.PlanterPlant_material.specularPower = 4
      Harp.PlanterPlant_material.specularColor = new BABYLON.Color3(0.125, 0.125, 0.125)
      Harp.setColor('Deck_Light', Harp.colors['tricorn-black'])
      Harp.setColor('Deck_Light_Glass', Harp.colors['glass'])
      Harp.setColor('Lantern', Harp.colors['rich-espresso'])

      Harp.setColor('LanternGlass', Harp.colors['glass'])
      Harp.LanternGlass_material.alpha = 0.25
      Harp.setColor('lounge_cushion', Harp.colors['cobble-stone'])

      Harp.setColor('TallPot', Harp.colors['tricorn-black'])
      Harp.TallPot_material.diffuseTexture = new BABYLON.Texture(Harp.textures['Perimeter_wall'])
      Harp.TallPot_material.specularPower = 4
      Harp.TallPot_material.specularColor = new BABYLON.Color3(0.125, 0.125, 0.125)
      Harp.setColor('ShortPot', Harp.colors['iron-gray'])
      Harp.ShortPot_material.diffuseTexture = new BABYLON.Texture(Harp.textures['Perimeter_wall'])
      Harp.ShortPot_material.specularPower = 4
      Harp.ShortPot_material.specularColor = new BABYLON.Color3(0.125, 0.125, 0.125)
      Harp.setColor('FarPot', Harp.colors['iron-gray'])
      Harp.FarPot_material.diffuseTexture = new BABYLON.Texture(Harp.textures['Perimeter_wall'])
      Harp.FarPot_material.specularPower = 4
      Harp.FarPot_material.specularColor = new BABYLON.Color3(0.125, 0.125, 0.125)

      Harp.setColor('ShortPlant', Harp.colors['white'])
      Harp.ShortPlant_material.diffuseTexture = new BABYLON.Texture(Harp.textures['amarili'])
      Harp.ShortPlant_material.specularPower = 4
      Harp.ShortPlant_material.specularColor = new BABYLON.Color3(0.125, 0.125, 0.125)
      Harp.setColor('FarPlant', Harp.colors['white'])
      Harp.FarPlant_material.diffuseTexture = new BABYLON.Texture(Harp.textures['amarili'])
      Harp.FarPlant_material.specularPower = 4
      Harp.FarPlant_material.specularColor = new BABYLON.Color3(0.125, 0.125, 0.125)

      Harp.setColor('Planter', Harp.colors['pearl-gray'])
      Harp.Planter_material.diffuseTexture = new BABYLON.Texture(Harp.textures['Perimeter_wall'])
      Harp.setColor('potsoil', Harp.colors['rich-espresso'])
      Harp.setColor('Perimeter_wall', Harp.colors['white'])
      Harp.Perimeter_wall_material.diffuseTexture = new BABYLON.Texture(Harp.textures['Perimeter_wall'])

      Harp.trim_color_material.specularPower = 15

      Harp.setEndCut('ogee')
    }
  }

  const scene = createScene()

  scene.executeWhenReady(function () {
    Harp.init()
    setTimeout(function(){
      document.querySelector('#renderCanvas').removeAttribute('style')
      document.querySelector('#loader').classList.add('fade-out');
      engine.resize()
      document.dispatchEvent(loadEvent);
      window.dispatchEvent(new CustomEvent('update-exterior'))
    }, 1500);
  })
  scene.clearColor = BABYLON.Color3.White();
  engine.runRenderLoop(function () {
    scene.render()
  })

  document.querySelector('#renderCanvas').addEventListener('wheel', evt => evt.preventDefault())

  window.addEventListener("resize", function () {
    engine.resize()
  })
  window.Harp = Harp
})